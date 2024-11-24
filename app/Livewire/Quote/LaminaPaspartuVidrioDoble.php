<?php

namespace App\Livewire\Quote;

use Livewire\Component;
use App\Services\Quote\LaminaPaspartuVidrioDobleService;

class LaminaPaspartuVidrioDoble extends Component
{
    // Declarar las propiedades públicas que serán utilizadas en el componente
    public $largo; // Largo de la lámina en centímetros
    public $ancho; // Ancho de la lámina en centímetros
    public $anchoIzDePptt; // Ancho del passepartout en los lados izquierdo y derecho en centímetros
    public $anchoSupInfPptt; // Ancho del passepartout en los lados superior e inferior en centímetros
    public $valorMoldura; // Valor de la moldura por metro lineal
    public $valorLamina; // Valor de la lámina por metro cuadrado
    public $resultados; // Variable para almacenar los resultados del cálculo
    public $showModal = false; // Variable para controlar la visualización del modal

    // Método para calcular los resultados utilizando el servicio LaminaPaspartuVidrioDobleService
    public function calcular(LaminaPaspartuVidrioDobleService $calculator)
    {
        // Crear un arreglo con los datos necesarios para el cálculo
        $data = [
            'largo' => $this->largo, // Largo de la lámina
            'ancho' => $this->ancho, // Ancho de la lámina
            'anchoIzDePptt' => $this->anchoIzDePptt, // Ancho del passepartout (izquierda y derecha)
            'anchoSupInfPptt' => $this->anchoSupInfPptt, // Ancho del passepartout (superior e inferior)
            'valorMoldura' => $this->valorMoldura, // Valor de la moldura por metro lineal
            'valorLamina' => $this->valorLamina, // Valor de la lámina por metro cuadrado
        ];

        // Llamar al método calculate del servicio con los datos proporcionados
        $this->resultados = $calculator->calculate($data);

        // Mostrar el modal con los resultados del cálculo
        $this->showModal = true;
    }

    // Método para renderizar la vista del componente
    public function render()
    {
        // Devolver la vista correspondiente al componente
        return view('livewire.quote.lamina-paspartu-vidrio-doble');
    }
}
