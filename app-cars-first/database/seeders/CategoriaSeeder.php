<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categoria;
use Illuminate\Database\Seeder;


class CategoriaSeeder extends Seeder
{
    public function run()
    {
        // Generar 10 categorías
        Categoria::factory()->count(10)->create();
    }
}