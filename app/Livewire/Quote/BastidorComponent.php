<?php

namespace App\Livewire\Quote;


use Livewire\Component;
use App\Services\Quote\BastidorService;

class BastidorComponent extends Component
{
    public $largo;
    public $ancho;
    public $valorChaflan;
    public $resultados;
    public $showModal = false;

    public function calcular(BastidorService $calculator)
    {
        $data = [
            'largo' => $this->largo,
            'ancho' => $this->ancho,
            'valorChaflan' => $this->valorChaflan,
        ];

        $this->resultados = $calculator->calculate($data);
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.quote.bastidor-component');
    }
}
