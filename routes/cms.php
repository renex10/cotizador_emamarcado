
<?php
// routes/cms.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cms\DashboardController;
use App\Http\Controllers\Cms\ModalSettingController;
use App\Http\Controllers\Cms\HeroSettingController;

// Ruta al dashboard del CMS
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Ruta para la configuración del modal
    Route::get('/modal-settings', [ModalSettingController::class, 'index'])->name('modal-settings');
    Route::put('/modal-settings', [ModalSettingController::class, 'update'])->name('modal-settings.update');
    
    // Ruta para la configuración del hero
    Route::get('/hero-settings', [HeroSettingController::class, 'index'])->name('hero-settings');
    Route::put('/hero-settings', [HeroSettingController::class, 'update'])->name('hero-settings.update');
    // Otras rutas del CMS...
});

