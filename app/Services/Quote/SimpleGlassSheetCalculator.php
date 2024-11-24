<?php

namespace App\Services\Quote;

use App\Models\Material;
use App\Models\Setting;

class SimpleGlassSheetCalculator
{
    public function calculate($data)
    {
        $largo = $data['largo'];
        $ancho = $data['ancho'];
        $valorMoldura = $data['valorMoldura'];
        $valorLamina = $data['valorLamina'];
        $cantidad = $data['cantidad'] ?? 1; // Añadir cantidad, por defecto 1
        $descuentoPorcentaje = $data['descuento'] ?? 0; // Añadir descuento, por defecto 0%

        // Obtener precios de materiales desde la base de datos
        $vidrioSimplePrice = Material::where('name', 'Vidrio Simple')->first()->price;
        $trupanPrice = Setting::where('key', 'trupan_price')->first()->value;

        // Obtener otros valores de configuración
        $iva = Setting::where('key', 'iva')->first()->value;
        $gastosGenerales = Setting::where('key', 'gastos_generales')->first()->value;

        // Calcular las medidas y precios
        $moldura = ($largo + $ancho) * 2 / 100;
        $molduraPrice = $moldura * $valorMoldura;

        $vidrio = ($largo / 100) * ($ancho / 100);
        $vidrioPrice = $vidrio * $vidrioSimplePrice;

        $trupan = ($largo / 100) * ($ancho / 100);
        $trupanPrice = $trupan * $trupanPrice;

        $subtotal = ($molduraPrice + $vidrioPrice + $trupanPrice) * $cantidad;
        $gastosGrales = $subtotal * $gastosGenerales;
        $subtotalConGastos = $subtotal + $gastosGrales;

        $descuento = $subtotalConGastos * ($descuentoPorcentaje / 100); // Calcula el descuento
        $subtotalConDescuento = $subtotalConGastos - $descuento;

        $ivaTotal = $subtotalConDescuento * $iva;
        $totalGeneral = $subtotalConDescuento + $ivaTotal;

        return [
            'subtotal' => round($subtotal, 0),
            'gastosGenerales' => round($gastosGrales, 0),
            'subtotalConGastos' => round($subtotalConGastos, 0),
            'descuento' => round($descuento, 0),
            'subtotalConDescuento' => round($subtotalConDescuento, 0),
            'iva' => round($ivaTotal, 0),
            'totalGeneral' => round($totalGeneral, 0),
            'detalles' => [
                'moldura' => $moldura,
                'molduraPrice' => $molduraPrice,
                'vidrio' => $vidrio,
                'vidrioPrice' => $vidrioPrice,
                'trupan' => $trupan,
                'trupanPrice' => $trupanPrice,
            ]
        ];
    }
}
