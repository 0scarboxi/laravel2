<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;

class ProductoFactory extends Factory
{
	protected $model = Producto::class;
	public function definition(): array
    {
		$categoria = Categoria::all();
        $proveedor = Proveedor::all();
        return [
            'nombre' => fake()->word(),
            'precio' => fake()->randomFloat(2, 0,1000),
			'stock' => fake()->numberBetween(0,999),
            'proveedor_rut' => fake()->randomElement($proveedor)->rut,
            'categoria_id' => fake()->randomElement($categoria)->id
		];
    }	
}