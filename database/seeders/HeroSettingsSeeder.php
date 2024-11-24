<?php

// database/seeders/HeroSettingsSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSetting;

class HeroSettingsSeeder extends Seeder
{
    public function run()
    {
        HeroSetting::create([
            'background_image' => 'frontend/img/web/enmarcado.jpg',
            'title' => 'El compomiso es nuestro mejor sello',
            'subtitle' => 'An agency for high growth startups',
            'button_text' => 'Stream Now',
            'button_url' => '/'
        ]);
    }
}

