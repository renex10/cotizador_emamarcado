<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear registros en la tabla de materiales
        Material::create(['name' => 'Vidrio Simple', 'price' => 9333]);
        Material::create(['name' => 'Vidrio Doble', 'price' => 12000]);
        Material::create(['name' => 'Foam', 'price' => 4044]);
        Material::create(['name' => 'Paspartú', 'price' => 11832]);
        Material::create(['name' => 'Trupán', 'price' => 4044]);
        Material::create(['name' => 'Lámina', 'price' => 0]);
        Material::create(['name' => 'Tela', 'price' => 2500]); // Añadido nuevo material Tela
    }
}
