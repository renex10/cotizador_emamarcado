<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para la nueva vista de registro (login)
/* Route::get('/login', function () {
    return view('auth.custom_auth.login'); // Cambia el nombre de la vista según la ubicación de tu archivo
})->name('login'); */

// Rutas protegidas por autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']); // Esta es la ruta que manejará el registro de usuarios
