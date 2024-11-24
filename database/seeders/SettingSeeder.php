<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            ['key' => 'iva', 'value' => '0.19'],
            ['key' => 'trupan_price', 'value' => '4044'],
            ['key' => 'montaje_tela_price', 'value' => '2500'],
            ['key' => 'gastos_generales', 'value' => '0.12'],
        ]);
    }
}
