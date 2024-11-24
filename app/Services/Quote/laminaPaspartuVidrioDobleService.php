<?php

namespace App\Services\Quote;

use App\Models\Material;
use App\Models\Setting;

class LaminaPaspartuVidrioDobleService
{
    public function calculate($data)
    {
        // Obtener datos de entrada
        $largo = $data['largo']; // Largo de la lámina en centímetros
        $ancho = $data['ancho']; // Ancho de la lámina en centímetros
        $anchoIzDePptt = $data['anchoIzDePptt']; // Ancho del passepartout en los lados izquierdo y derecho en centímetros
        $anchoSupInfPptt = $data['anchoSupInfPptt']; // Ancho del passepartout en los lados superior e inferior en centímetros
        $valorMoldura = $data['valorMoldura']; // Valor de la moldura por metro lineal
        $valorLamina = $data['valorLamina']; // Valor de la lámina por metro cuadrado

        // Obtener precios de materiales desde la base de datos
        $vidrioDisfusoPrice = Material::where('name', 'Vidrio Doble')->first()->price; // Precio del vidrio doble
        $passepartoutPrice = Material::where('name', 'Paspartú')->first()->price; // Precio del passepartout
        $trupanPrice = Setting::where('key', 'trupan_price')->first()->value; // Precio del trupan

        // Obtener otros valores de configuración desde la base de datos
        $iva = Setting::where('key', 'iva')->first()->value; // Porcentaje del IVA
        $gastosGenerales = Setting::where('key', 'gastos_generales')->first()->value; // Porcentaje de gastos generales

        // Calcular las medidas y precios
        // Calcular la longitud total de la moldura (perímetro total de la pieza)
        // Se suman los lados (largo + ancho) y el ancho del passepartout en los cuatro lados
        $moldura = 2 * ($largo + $ancho) / 100 + 2 * ($anchoIzDePptt + $anchoSupInfPptt) / 100;
        // Calcular el precio de la moldura
        $molduraPrice = $moldura * $valorMoldura;

        // Calcular el área del vidrio
        // Se suman las dimensiones de la lámina con las dimensiones del passepartout en los cuatro lados
        $vidrio = ($largo + 2 * $anchoIzDePptt) / 100 * ($ancho + 2 * $anchoSupInfPptt) / 100;
        // Calcular el precio del vidrio
        $vidrioPrice = $vidrio * $vidrioDisfusoPrice;

        // Calcular el área del passepartout (igual que el vidrio)
        $passepartout = $vidrio;
        // Calcular el precio del passepartout
        $passepartoutPriceTotal = $passepartout * $passepartoutPrice;

        // Calcular el área del trupan (igual que el vidrio)
        $trupan = $vidrio;
        // Calcular el precio del trupan
        $trupanPrice = $trupan * $trupanPrice;

        // Calcular el subtotal sumando los precios de todos los materiales
        $subtotal = $molduraPrice + $vidrioPrice + $passepartoutPriceTotal + $trupanPrice;
        // Calcular los gastos generales
        $gastosGrales = $subtotal * $gastosGenerales;
        // Calcular el subtotal con gastos generales
        $subtotalConGastos = $subtotal + $gastosGrales;

        // Calcular el IVA sobre el subtotal con gastos generales
        $ivaTotal = $subtotalConGastos * $iva;
        // Calcular el total general sumando el IVA al subtotal con gastos generales
        $totalGeneral = $subtotalConGastos + $ivaTotal;

        // Devolver los resultados redondeados
        return [
            'subtotal' => round($subtotal, 0), // Subtotal redondeado
            'gastosGenerales' => round($gastosGrales, 0), // Gastos generales redondeados
            'subtotalConGastos' => round($subtotalConGastos, 0), // Subtotal con gastos generales redondeado
            'iva' => round($ivaTotal, 0), // IVA redondeado
            'totalGeneral' => round($totalGeneral, 0), // Total general redondeado
        ];
    }
}

