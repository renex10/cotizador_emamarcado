<?php

namespace App\Services\Quote;

use App\Models\Material;
use App\Models\Setting;

class DoubleGlassSheetCalculator
{
    public function calculate($data)
    {
        $largo = $data['largo'];
        $ancho = $data['ancho'];
        $valorMoldura = $data['valorMoldura'];
        $valorLamina = $data['valorLamina'];

        // Obtener precios de materiales desde la base de datos
        $vidrioDisfusoPrice = Material::where('name', 'Vidrio Doble')->first()->price;
        $trupanPrice = Setting::where('key', 'trupan_price')->first()->value;

        // Obtener otros valores de configuración
        $iva = Setting::where('key', 'iva')->first()->value;
        $gastosGenerales = Setting::where('key', 'gastos_generales')->first()->value;

        // Calcular las medidas y precios
        $moldura = ($largo + $ancho) * 2 / 100;
        $molduraPrice = $moldura * $valorMoldura;

        $vidrio = ($largo / 100) * ($ancho / 100);
        $vidrioPrice = $vidrio * $vidrioDisfusoPrice;

        $trupan = ($largo / 100) * ($ancho / 100);
        $trupanPrice = $trupan * $trupanPrice;

        $subtotal = $molduraPrice + $vidrioPrice + $trupanPrice;
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
