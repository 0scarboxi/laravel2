<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Detalle;

class VentaController extends Controller
{
    /**
     * Muestra una lista de todas las ventas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::all();
        return view('venta.index', compact('ventas'));
    }

    public function show($rut)
    {
        // Encuentra el cliente con el rut proporcionado
        $cliente = Cliente::where('rut', $rut)->first();

        if (!$cliente) {
            // si no se encuentra el cliente redirige con un error
            return redirect()->route('clientes.index')->with('error', 'Cliente no encontrado.');
        }

        // encuentra todas las ventas asociadas al cliente
        $ventas = Venta::where('cliente_rut', $cliente->rut)->get();

        return view('venta.show', compact('ventas','cliente'));
    }
    public function destroy(string $id)
    {
        $venta=Venta::findOrFail($id);
        if ($venta) {
            // elimina los detalles asociados con esta venta
            Detalle::where('venta_id', $id)->delete();
            
            // elimina la venta
            $venta->delete();
        return redirect()->route('ventas.index')->with('Éxito', 'Venta borrada correctamente');
    }
}
}
