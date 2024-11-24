<?php

// database/seeders/ModalSettingsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModalSetting;

class ModalSettingsSeeder extends Seeder
{
    public function run()
    {
        ModalSetting::create([
            'modal_active' => false,
            'title' => 'Bienvenido',
            'content' => 'Este es el mensaje del modal',
            'image_path' => null,
        ]);
    }
}
