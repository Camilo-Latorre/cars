<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class; // Enlaza con el modelo Categoria

    public function definition()
    {
        return [
            'nombre' => $this->faker->word, // Nombre aleatorio
            'descripcion' => $this->faker->sentence, // Descripción aleatoria
            'estado' => $this->faker->boolean, // Estado aleatorio
            'prioridad' => $this->faker->numberBetween(1, 10), // Prioridad entre 1 y 10
        ];
    }
}


