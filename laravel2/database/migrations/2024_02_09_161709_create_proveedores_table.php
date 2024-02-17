<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('rut')->unique();
            $table->string('nombre', 50);
            $table->string('web', 500);
            $table->string('telefono',15);
            $table->string('calle',100);
            $table->integer('numero');
            $table->string('comuna',100)->default('0');
            $table->string('ciudad',60);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};
