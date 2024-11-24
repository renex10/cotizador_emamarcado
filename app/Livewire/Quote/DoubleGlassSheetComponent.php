<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use App\Services\Quote\DoubleGlassSheetCalculator;

class DoubleGlassSheetComponent extends Component
{
    public $largo;
    public $ancho;
    public $valorMoldura;
    public $valorLamina;
    public $resultados;
    public $showModal = false;

    public function calcular(DoubleGlassSheetCalculator $calculator)
    {
        $data = [
            'largo' => $this->largo,
            'ancho' => $this->ancho,
            'valorMoldura' => $this->valorMoldura,
            'valorLamina' => $this->valorLamina,
        ];

        $this->resultados = $calculator->calculate($data);
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.quote.double-glass-sheet-component');
    }
}
