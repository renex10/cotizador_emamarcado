<?php
/*archivo modificado
   app\Providers\RouteServiceProvider.php 
    Route::middleware('web', 'auth')
  ->prefix('admin')
  ->name('admin.')
  ->group(base_path('routes/admin.php'));*/

use Illuminate\Support\Facades\Route;

// routes/admin.php







// Ruta para la vista del dashboard
// Ruta para la vista del dashboard 
Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');


// Ruta para la vista del póster
Route::get('/poster', function () {
    return view('admin.poster');
})->name('poster');

// Nueva ruta para "Lám. v. s (Lámina en vidrio simple)"
Route::get('/lamina-vidrio-simple', function () {
    return view('admin.laminaVidrioSimple');
})->name('laminaVidrioSimple');

// Nueva ruta para "Lám. v. d (Lámina en vidrio doble)"
Route::get('/lamina-vidrio-doble', function () {
    return view('admin.laminaVidrioDoble');
})->name('laminaVidrioDoble');

// Nueva ruta para "Lám. pp. y v.s (Lámina con paspartú y vidrio simple)" 
Route::get('/lamina-paspartu-vidrio-simple', function () {
    return view('admin.laminaPaspartuVidrioSimple');
})->name('laminaPaspartuVidrioSimple');

// Nueva ruta para "Lám. pp y v.d (Lámina con paspartú y vidrio doble)" 
Route::get('/lamina-paspartu-vidrio-doble', function () {
    return view('admin.laminaPaspartuVidrioDoble');
})->name('laminaPaspartuVidrioDoble');



// Ruta para el componente de bastidor
Route::get('/bastidor', function () {
    return view('admin.bastidor');
})->name('bastidor');

Route::get('/calculo-tela', function () {
    return view('admin.tela');
})->name('tela');

Route::get('/calculo-tela-con-ppt', function () {
    return view('admin.tela-ppt');
})->name('telappt');

