<?php

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            SettingSeeder::class,
            UserSeeder::class,
            ProductSeeder::class,
            MaterialSeeder::class,
            FrameSeeder::class,
            QuoteSeeder::class,
            QuoteItemSeeder::class,
            PriceSeeder::class,
            ModalSettingsSeeder::class,
            HeroSettingsSeeder::class,  // Añadir aquí el seeder de HeroSettings
        ]);
    }
}
