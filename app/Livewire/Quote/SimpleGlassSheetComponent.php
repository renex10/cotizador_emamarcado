<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use App\Services\Quote\SimpleGlassSheetCalculator;

class SimpleGlassSheetComponent extends Component
{
    public $largo;
    public $ancho;
    public $valorMoldura;
    public $valorLamina;
    public $cantidad = 1; // Campo para la cantidad
    public $descuento = 0; // Campo para el descuento
    public $resultados;
    public $showModal = false;

    protected $rules = [
        'largo' => 'required|numeric',
        'ancho' => 'required|numeric',
        'valorMoldura' => 'required|numeric',
        'valorLamina' => 'required|numeric',
        'cantidad' => 'required|integer|min:1',
        'descuento' => 'required|numeric|min:0|max:100', // Descuento entre 0 y 100%
    ];

    public function calcular(SimpleGlassSheetCalculator $calculator)
    {
        $this->validate();

        $data = [
            'largo' => $this->largo,
            'ancho' => $this->ancho,
            'valorMoldura' => $this->valorMoldura,
            'valorLamina' => $this->valorLamina,
            'cantidad' => $this->cantidad,
            'descuento' => $this->descuento,
        ];

        $this->resultados = $calculator->calculate($data);
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.quote.simple-glass-sheet-component');
    }
}
