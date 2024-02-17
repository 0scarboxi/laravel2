<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
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
            'telefonos' => generarTelefonos(),
            'calle' => fake()->streetName(),
            'numero' => fake()->numberBetween(1, 1000),
            'ciudad' => fake()->streetName(),
            'comuna' => fake()->randomElement(['Ocasional', 'Regular', 'Frecuente', 'Embajadores'])
        ];
    }

}
function generarTelefonos(): string
{
    $cantidadTelefonos = rand(1, 3);
    $telefonos = [];

    for ($i = 0; $i < $cantidadTelefonos; $i++) {
        $telefonos[] = fake()->phoneNumber();
    }

    return json_encode($telefonos);
}