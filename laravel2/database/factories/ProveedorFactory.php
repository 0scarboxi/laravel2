<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rut' => fake()->bothify('########-#'),
            'nombre' => fake()->name(),
            'web' => fake()->url(),
            'telefono' => fake()->phoneNumber(),
            'calle' => fake()->streetName(),
            'numero' => fake()->numberBetween(1, 100),
            'comuna' => fake()->name(),
            'ciudad' => fake()->name()
        ];
    }
}
