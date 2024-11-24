<?php

namespace App\Services\Quote;

use App\Models\Setting;

class CalculationService
{
    public function calculate($largo, $ancho, $valorMoldura, $valorLamina)
    {
        // Convertir las medidas a metros lineales y cuadrados
        $moldura = 2 * (($largo + $ancho) / 100); // metros lineales
        $trupan = ($largo * $ancho) / 10000; // metros cuadrados

        // Obtener valores desde los modelos
        $settings = Setting::pluck('value', 'key');
        $montaje = $settings['montaje'] ?? 2500;
        $iva = $settings['iva'] ?? 0.19;
        $gastosGrles = $settings['gastos_generales'] ?? 0.12;

        // Calcular precios
        $precioMoldura = $moldura * $valorMoldura;
        $precioTrupan = $trupan * $valorLamina;

        // Calcular subtotales y totales
        $subtotal = $precioMoldura + $precioTrupan + $montaje;
        $gastosGenerales = $subtotal * $gastosGrles;
        $subtotalConGastos = $subtotal + $gastosGenerales;
        $ivaTotal = $subtotalConGastos * $iva;
        $totalGeneral = $subtotalConGastos + $ivaTotal;

        return [
            'subtotal' => $subtotal,
            'gastosGenerales' => $gastosGenerales,
            'subtotalConGastos' => $subtotalConGastos,
            'iva' => $ivaTotal,
            'totalGeneral' => $totalGeneral
        ];
    }
}
