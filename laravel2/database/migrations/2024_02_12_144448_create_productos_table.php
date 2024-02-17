<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->integer('categoria_id')->foreign("categoria_id")->references('id')->on('categorias')->onDelete("cascade");
            $table->string('proveedor_rut')->foreign("proveedor_rut")->references('rut')->on('proveedores')->onDelete("cascade");
            $table->string('nombre',25);
            $table->decimal('precio',8,2);
            $table->integer('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};