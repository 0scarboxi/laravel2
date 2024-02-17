<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoriaFactory extends Factory
{
	public function definition(): array
    {
        return [
			'nombre' => fake()->word(),
			'descripcion' => fake()->sentence()
		];
    }	
}
