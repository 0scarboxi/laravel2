<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;

/*
|--------------------------------------------------------------------------
| Rutas Web de los controladores de Clientes y de Ventas
|--------------------------------------------------------------------------
*/

Route::get('/', [ClienteController::class, 'index']);


Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');// para el index  de cliente 
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create'); // para el create de cliente
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store'); // para el store  de cliente
Route::get('/clientes/{rut}', [ClienteController::class, 'show'])->name('clientes.show'); // para el show  de cliente
Route::get('/clientes/{rut}/edit', [ClienteController::class, 'edit'])->name('clientes.edit'); // para el edit  de cliente
Route::put('/clientes/{rut}', [ClienteController::class, 'update'])->name('clientes.update'); // para actualizar el cliente
Route::delete('/clientes/{rut}', [ClienteController::class, 'destroy'])->name('clientes.destroy'); // para el borrar  de cliente

Route::get('/ventas/{rut}', [VentaController::class, 'show'])->name('ventas.show'); // para el show  de ventas
Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index'); //para el index de ventas
Route::delete('/ventas/{id}', [VentaController::class, 'destroy'])->name('ventas.destroy'); // para el borrar de ventas




