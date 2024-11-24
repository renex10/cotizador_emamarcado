<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\ProductosController;

// Página de inicio
Route::get('/', function () {
    return view('frontend.pages.index'); // Ruta de la vista
})->name('frontend.index');

// Ruta personalizada para login
Route::get('/login', function () {
    return view('auth.custom_auth.login'); // Vista personalizada de login
})->name('login');

// Ruta para la página de contacto
Route::get('/contacto', function () {
    return view('frontend.pages.contacto'); // Vista de contacto
})->name('frontend.contacto');

// Nueva ruta para productos
Route::get('/productos', [ProductosController::class, 'index'])->name('frontend.productos');
