<?php

namespace App\Services\Quote;

class PosterService
{
    public function calculate(array $data): array
    {
        $largo = $data['largo'];
        $ancho = $data['ancho'];
        $valorMoldura = $data['valor_moldura'];
        $valorLamina = $data['valor_lamina'];
        $cantidad = $data['cantidad'] ?? 1;
        $descuentoPorcentaje = $data['descuento'] ?? 0;

        // Cálculos
        $medidaMoldura = ($largo + $ancho) * 2 / 100; // en metros lineales
        $precioMoldura = $medidaMoldura * $valorMoldura;

        $medidaTrupan = ($largo / 100) * ($ancho / 100); // en metros cuadrados
        $precioTrupan = $medidaTrupan * 4044; // Precio fijo del trupan

        $montaje = 2500; // Precio fijo del montaje

        $subtotal = ($precioMoldura + $precioTrupan + $montaje) * $cantidad;
        $gastosGrles = $subtotal * 0.12; // 12% de gastos generales
        $subtotalConGastos = $subtotal + $gastosGrles;

        $descuento = $subtotalConGastos * ($descuentoPorcentaje / 100); // Calcula el descuento
        $total = $subtotalConGastos - $descuento + $valorLamina;

        $iva = $total * 0.19; // 19% de IVA
        $totalGeneral = $total + $iva;

        return [
            'medida_moldura' => $medidaMoldura,
            'precio_moldura' => $precioMoldura,
            'medida_trupan' => $medidaTrupan,
            'precio_trupan' => $precioTrupan,
            'montaje' => $montaje,
            'subtotal' => $subtotal,
            'gastos_grles' => $gastosGrles,
            'subtotal_con_gastos' => $subtotalConGastos,
            'descuento' => $descuento,
            'total' => $total,
            'iva' => $iva,
            'total_general' => $totalGeneral,
        ];
    }
}
