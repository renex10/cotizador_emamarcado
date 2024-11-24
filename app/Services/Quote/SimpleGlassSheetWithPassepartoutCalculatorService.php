<?php

namespace App\Services\Quote;

use App\Models\Material;
use App\Models\Setting;

class SimpleGlassSheetWithPassepartoutCalculatorService
{
    public function calculate($data)
    {
        $largo = $data['largo'];
        $ancho = $data['ancho'];
        $anchoIzDePptt = $data['anchoIzDePptt'];
        $anchoSupInfPptt = $data['anchoSupInfPptt'];
        $valorMoldura = $data['valorMoldura'];
        $valorLamina = $data['valorLamina'];

        // Obtener precios de materiales desde la base de datos
        $vidrioSimplePrice = Material::where('name', 'Vidrio Simple')->first()->price;
        $passepartoutPrice = Material::where('name', 'Paspartú')->first()->price;
        $trupanPrice = Setting::where('key', 'trupan_price')->first()->value;

        // Obtener otros valores de configuración
        $iva = Setting::where('key', 'iva')->first()->value;
        $gastosGenerales = Setting::where('key', 'gastos_generales')->first()->value;

        // Calcular las medidas y precios
        $moldura = 2 * ($largo + $ancho) / 100 + 2 * ($anchoIzDePptt + $anchoSupInfPptt) / 100;
        $molduraPrice = $moldura * $valorMoldura;

        $vidrio = ($largo + 2 * $anchoIzDePptt) / 100 * ($ancho + 2 * $anchoSupInfPptt) / 100;
        $vidrioPrice = $vidrio * $vidrioSimplePrice;

        $passepartout = $vidrio;
        $passepartoutPriceTotal = $passepartout * $passepartoutPrice;

        $trupan = $vidrio;
        $trupanPrice = $trupan * $trupanPrice;

        $subtotal = $molduraPrice + $vidrioPrice + $passepartoutPriceTotal + $trupanPrice;
        $gastosGrales = $subtotal * $gastosGenerales;
        $subtotalConGastos = $subtotal + $gastosGrales;

        $ivaTotal = $subtotalConGastos * $iva;
        $totalGeneral = $subtotalConGastos + $ivaTotal;

        return [
            'subtotal' => round($subtotal, 0),
            'gastosGenerales' => round($gastosGrales, 0),
            'subtotalConGastos' => round($subtotalConGastos, 0),
            'iva' => round($ivaTotal, 0),
            'totalGeneral' => round($totalGeneral, 0),
        ];
    }
}
