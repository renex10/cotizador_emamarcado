<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use App\Models\Product;
use App\Models\Material;
use App\Models\Frame;
use App\Services\QuoteService;

class Poster extends Component
{
    public $product_id;
    public $material_id;
    public $frame_id;
    public $width;
    public $height;
    public $subtotal;
    public $tax;
    public $total;

    public $quoteItems = [];
    public $products;
    public $materials;
    public $frames;

    protected $quoteService;

    /**
     * Inicializar dependencias y datos.
     */
    public function mount(QuoteService $quoteService)
    {
        $this->quoteService = $quoteService;

        // Cargar los datos iniciales
        $this->products = Product::all();
        $this->materials = Material::all();
        $this->frames = Frame::all();
    }

    /**
     * Calcular el subtotal, impuesto y total basado en las dimensiones.
     */
    public function calculateTotal()
    {
        $calculation = $this->quoteService->calculateQuote(
            $this->material_id,
            $this->frame_id,
            $this->width,
            $this->height
        );

        $this->subtotal = $calculation['subtotal'];
        $this->tax = $calculation['tax'];
        $this->total = $calculation['total'];
    }

    /**
     * Guardar la cotización en la base de datos.
     */
    public function saveQuote()
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'material_id' => 'required|exists:materials,id',
            'frame_id' => 'required|exists:frames,id',
            'width' => 'required|numeric|min:0.1',
            'height' => 'required|numeric|min:0.1',
        ]);

        $this->quoteService->saveQuote([
            'product_id' => $this->product_id,
            'material_id' => $this->material_id,
            'frame_id' => $this->frame_id,
            'width' => $this->width,
            'height' => $this->height,
            'subtotal' => $this->subtotal,
            'tax' => $this->tax,
            'total' => $this->total,
        ], $this->quoteItems);

        $this->reset(['product_id', 'material_id', 'frame_id', 'width', 'height', 'subtotal', 'tax', 'total', 'quoteItems']);

        session()->flash('message', 'Cotización guardada exitosamente.');
    }

    public function render()
    {
        return view('livewire.quote.poster');
    }
}
