<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use App\Services\Quote\PosterService;

class PosterComponent extends Component
{
    public $largo;
    public $ancho;
    public $valorMoldura;
    public $valorLamina;
    public $cantidad = 1;
    public $descuento = 0;
    public $resultados;
    public $showModal = false;

    protected $rules = [
        'largo' => 'required|numeric',
        'ancho' => 'required|numeric',
        'valorMoldura' => 'required|numeric',
        'valorLamina' => 'required|numeric',
        'cantidad' => 'required|integer|min:1',
        'descuento' => 'required|numeric|min:0|max:100', // Validación del descuento
    ];

    public function calcular(PosterService $calculator)
    {
        $this->validate();

        $data = [
            'largo' => $this->largo,
            'ancho' => $this->ancho,
            'valor_moldura' => $this->valorMoldura,
            'valor_lamina' => $this->valorLamina,
            'cantidad' => $this->cantidad,
            'descuento' => $this->descuento,
        ];

        $this->resultados = $calculator->calculate($data);
        $this->showModal = true;
    }

    public function render()
    {
        return view('livewire.quote.poster-component');
    }
}
