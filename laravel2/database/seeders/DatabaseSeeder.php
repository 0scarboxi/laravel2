<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /*
        lo hemos creado asi para tenerlo todo en un mismo archivo
        y no tener que crear 5 seeders que hacen lo mismo
        */
        \App\Models\Proveedor::factory(10)->create();
        \App\Models\Venta::factory(10)->create();
        \App\Models\Categoria::factory(10)->create();
        \App\Models\Producto::factory(10)->create();
        \App\Models\Detalle::factory(10)->create();

    }
}
