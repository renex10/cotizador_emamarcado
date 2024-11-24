<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Frame;

class FrameSeeder extends Seeder
{
    public function run()
    {
        Frame::create(['type' => 'Biselado', 'price' => 15000]);
        Frame::create(['type' => 'Planas', 'price' => 10000]);
        Frame::create(['type' => 'Curvas', 'price' => 12000]);
        Frame::create(['type' => 'Artísticas', 'price' => 20000]);
    }
}
