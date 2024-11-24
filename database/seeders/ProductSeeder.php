<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create(['name' => 'Póster', 'description' => 'Póster enmarcado', 'price' => 5000]);
        Product::create(['name' => 'Lámina en vidrio simple', 'description' => 'Lámina en vidrio simple', 'price' => 7000]);
        Product::create(['name' => 'Lámina en vidrio doble', 'description' => 'Lámina en vidrio doble', 'price' => 9000]);
        Product::create(['name' => 'Lámina con paspartú y vidrio simple', 'description' => 'Lámina con paspartú y vidrio simple', 'price' => 8000]);
        Product::create(['name' => 'Lámina con paspartú y vidrio doble', 'description' => 'Lámina con paspartú y vidrio doble', 'price' => 10000]);
        Product::create(['name' => 'Poner Bastidor', 'description' => 'Poner bastidor', 'price' => 6000]);
        Product::create(['name' => 'Sólo Tela', 'description' => 'Sólo tela', 'price' => 4000]);
        Product::create(['name' => 'Tela con paspartú', 'description' => 'Tela con paspartú', 'price' => 7000]);
        Product::create(['name' => 'Lámina en foam con vidrio opaco', 'description' => 'Lámina en foam con vidrio opaco', 'price' => 6500]);
        Product::create(['name' => 'Lámina en foam con vidrio simple', 'description' => 'Lámina en foam con vidrio simple', 'price' => 5500]);
        Product::create(['name' => 'Entrevista', 'description' => 'Enmarcado para entrevistas', 'price' => 4500]);
        Product::create(['name' => 'Enmarcado de planos', 'description' => 'Enmarcado de planos', 'price' => 7500]);
        Product::create(['name' => 'Enmarcado biselado', 'description' => 'Enmarcado biselado', 'price' => 8500]);
        Product::create(['name' => 'Vidrios', 'description' => 'Diferentes tipos de vidrios', 'price' => 2000]);
    }
}
