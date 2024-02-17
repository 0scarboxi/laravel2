<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Venta;
use App\Models\Producto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DetalleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $venta = Venta::all();
        $producto = Producto::all();

        return [
            'cantidad' => fake()->numberBetween(1, 1000),
            'producto_id' => fake()->randomElement($producto)->id,
            'venta_id' => fake()->randomElement($venta)->id
        ];
    }
}
