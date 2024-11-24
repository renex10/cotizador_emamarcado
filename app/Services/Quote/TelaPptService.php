<?php

namespace App\Services\Quote;

use App\Models\Setting;
use App\Models\Material;

class TelaPptService
{
    /**
     * Calcula el precio para la tela con paspartú y otros componentes.
     *
     * @param array $data Datos de entrada que incluyen largo, ancho y valores de la moldura y la lámina.
     * @return array Resultados del cálculo incluyendo subtotal, gastos generales, IVA y total general.
     * @throws \Exception
     */
    public function calculate($data)
    {
        $largo = $data['largo'];
        $ancho = $data['ancho'];
        $anchoIzDePptt = $data['anchoIzDePptt'];
        $anchoSupInfPptt = $data['anchoSupInfPptt'];
        $valorMoldura = $data['valorMoldura'];
        $valorLamina = $data['valorLamina'];

        // Obtener otros valores de configuración
        $ivaSetting = Setting::where('key', 'iva')->first();
        if (!$ivaSetting) {
            throw new \Exception('Configuración de IVA no encontrada');
        }
        $iva = $ivaSetting->value;

        $gastosGeneralesSetting = Setting::where('key', 'gastos_generales')->first();
        if (!$gastosGeneralesSetting) {
            throw new \Exception('Configuración de gastos generales no encontrada');
        }
        $gastosGenerales = $gastosGeneralesSetting->value;

        // Calcular las medidas y precios
        $moldura = (2 * ($largo + $ancho)) / 100;
        $molduraPrice = $moldura * $valorMoldura;

        $paspartuArea = ($largo + 2 * $anchoIzDePptt) * ($ancho + 2 * $anchoSupInfPptt) / 10000 - ($largo * $ancho / 10000);
        $paspartuPrice = $paspartuArea * 11832; // Precio fijo para el paspartú.

        $chaflan = $moldura; // En este caso, se asume que el chaflán es igual a la moldura.
        $chaflanPrice = $chaflan * 1500; // Precio fijo para el chaflán.

        $subtotal = $molduraPrice + $paspartuPrice + $chaflanPrice;
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
