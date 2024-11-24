<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        // Configura tu API Key de Unsplash
        $accessKey = 'TU_API_KEY_UNSPLASH'; // Regístrate en Unsplash para obtener una clave
        $response = Http::get("https://api.unsplash.com/search/photos", [
            'query' => 'productos',
            'client_id' => $accessKey,
            'per_page' => 10, // Número de imágenes a mostrar
        ]);

        // Decodifica la respuesta
        $images = $response->json('results');

        // Retorna la vista con las imágenes
        return view('frontend.pages.productos', compact('images'));
    }
}