<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use App\Services\Quote\SimpleGlassSheetWithPassepartoutCalculatorService;

class SimpleGlassSheetWithPassepartoutCalculator extends Component
{
    public $largo;
    public $ancho;
    public $anchoIzDePptt;
    public $anchoSupInfPptt;
    public $valorMoldura;
    public $valorLamina;
    public $resultados;
    public $showModal = false;

    public function calcular(SimpleGlassSheetWithPassepartoutCalculatorService $calculator)
    {
        $data = [
            'largo' => $this->largo,
            'ancho' => $this->ancho,
            'anchoIzDePptt' => $this->anchoIzDePptt,
            'anchoSupInfPptt' => $this->anchoSupInfPptt,
            'valorMoldura' => $this->valorMoldura,
            'valorLamina' => $this->valorLamina,
        ];

        $this->resultados = $calculator->calculate($data);
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.quote.simple-glass-sheet-with-passepartout-calculator');
    }
}
