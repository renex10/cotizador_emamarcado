<?php

namespace App\Providers;

use App\Services\Quote\CalculationService;  // Asegúrate de que esté importada la clase
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       /*  $this->app->singleton(CalculationService::class, function ($app) {
            return new CalculationService();
        }); */
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
