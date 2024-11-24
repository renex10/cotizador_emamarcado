<?php

// app/Http/Controllers/Cms/ModalSettingController.php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\ModalSetting;
use Illuminate\Http\Request;

class ModalSettingController extends Controller
{
    public function index()
    {
        $modalSetting = ModalSetting::first();
        return view('cms.pages.modal_settings', compact('modalSetting')); // Actualizar la ruta de la vista
    }

    public function update(Request $request)
    {
        $modalSetting = ModalSetting::first();

        $modalSetting->update([
            'modal_active' => $request->has('modal_active'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image_path' => $request->file('image') ? $request->file('image')->store('modal_images') : $modalSetting->image_path
        ]);

        return redirect()->back()->with('status', 'Configuración del modal actualizada.');
    }
}
