<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard del CMS.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Puedes agregar lógica aquí para obtener datos del dashboard, como estadísticas, actividades recientes, etc.
        
        return view('cms.pages.dashboard');
    }
}
