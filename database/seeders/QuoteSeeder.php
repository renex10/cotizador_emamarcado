<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quote;

class QuoteSeeder extends Seeder
{
    public function run()
    {
        Quote::create([
            'product_id' => 1,
            'material_id' => 1,
            'frame_id' => 1,
            'width' => 84.0,
            'height' => 53.0,
            'subtotal' => 59080,
            'tax' => 11225,
            'total' => 70305,
        ]);
    }
}
