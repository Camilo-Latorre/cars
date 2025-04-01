<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition()
    {
        return [

            'car_make' => $this->faker->company,
            'car_model' => $this->faker->word,
            'car_year' => $this->faker->year,
            'car_price' => $this->faker->randomFloat(2, 1000, 100000),
            'car_status' => $this->faker->randomElement(['available', 'sold']),
            'categoria_id' => Categoria::factory(),
            'codigo_barras' => $this->faker->unique()->numerify('##########'),

        ];
    }
}
