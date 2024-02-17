<?php

namespace Database\Factories;
use App\Models\Cliente;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venta>
 */
class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cliente = Cliente::factory()->create();
        $clientesrut=Cliente::pluck('rut')->toArray();
        return [
            'fecha' => fake()->date(),
            'cliente_rut' => fake()->randomElement($clientesrut),
            'descuento' => fake()->randomFloat(2, 0, 100),
            'monto_final' => fake()->randomFloat(2, 0, 10000)
        ];
    }
}
