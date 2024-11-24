<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Price;

class PriceSeeder extends Seeder
{
    public function run()
    {
        Price::create([
            'material_id' => 1,
            'price' => 9333,
            'effective_date' => now()->subMonths(1),
        ]);

        Price::create([
            'material_id' => 2,
            'price' => 14000,
            'effective_date' => now()->subMonths(2),
        ]);

        Price::create([
            'material_id' => 3,
            'price' => 11832,
            'effective_date' => now()->subMonths(3),
        ]);

        Price::create([
            'material_id' => 4,
            'price' => 4044,
            'effective_date' => now()->subMonths(4),
        ]);
    }
}
