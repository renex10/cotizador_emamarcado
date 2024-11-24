<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use App\Services\Quote\CalculationService;

class CalculationComponent extends Component
{
    public $largo, $ancho, $valorMoldura, $valorLamina;
    public $resultados = [];
    public $showModal = false;

    protected $calculationService;

    public function __construct()
    {
        $this->calculationService = new CalculationService();
    }

    public function calcular()
    {
        $this->resultados = $this->calculationService->calculate(
            $this->largo,
            $this->ancho,
            $this->valorMoldura,
            $this->valorLamina
        );

        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.quote.calculation-component');
    }
}
