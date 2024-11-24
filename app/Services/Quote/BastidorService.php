<?php

namespace App\Services\Quote;

use App\Models\Material;
use App\Models\Setting;

class BastidorService
{
    public function calculate($data)
    {
        $largo = $data['largo'];
        $ancho = $data['ancho'];
        $valorChaflan = $data['valorChaflan'];

        // Obtener precios de materiales desde la base de datos
        $montajeTelaPrice = Setting::where('key', 'montaje_tela_price')->first()->value;

        // Obtener otros valores de configuración
        $iva = Setting::where('key', 'iva')->first()->value;
        $gastosGenerales = Setting::where('key', 'gastos_generales')->first()->value;

        // Calcular las medidas y precios
        $chaflan = 2 * ($largo + $ancho) / 100;
        $chaflanPrice = $chaflan * $valorChaflan;

        $subtotal = $chaflanPrice + $montajeTelaPrice;
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
