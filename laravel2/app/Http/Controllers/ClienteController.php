<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\View;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use App\Models\Venta;

class ClienteController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // array con todos los libros de la BBDD
        $clientes=Cliente::all(); 

        return view('cliente.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            "nombre"=>"required",
            "rut" => [
                "required",
                Rule::unique('clientes', 'rut'),
            ],
            "calle"=>"required",
            "numero"=>"required",
            "ciudad"=>"required",
            "comuna"=>"required|in:Ocasional,Regular,Frecuente,Embajadores",
            "telefonos"=>"required",
            "telefonos.*"=>"required"
        ], [
            'nombre.required' => 'Tu nombre es indispensable.',
            'rut.required' => 'Tu RUT aun mas indispensable.',
            'calle.required' => 'Se necesita su dirección completa, le falta la calle.',
            'numero.required' => 'Se necesita su dirección completa, le falta el número.',
            'ciudad.required' => 'Se necesita su dirección completa, le falta la ciudad.',
            'comuna.required' => 'Se necesita su dirección completa, le falta la comuna.',
            'telefonos.*.required' => 'No dejes los campos de telefonos vacios.',
            'telefonos.required' => 'Ha de introducir un telefono.',
            'comuna.in' => 'Debe de ser uno de la lista: Ocasional, Regular, Frecuente, Embajadores.'
        ]);
        $telefonos = $request->input('telefonos');
        $datos = $request->all();
        $datos['telefonos'] = json_encode($telefonos);
        $cliente=Cliente::create($datos);
        
        return redirect ("/clientes/" .$cliente->rut)->with('Éxito', 'Libro creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $rut)
    {
        $cliente = Cliente::findOrFail($rut);
        
            return view('cliente.show',compact('cliente')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $rut) : View
    {
        $cliente = Cliente::findOrFail($rut);
        
            return view('cliente.edit',compact('cliente')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $rut)
    {
        $request->validate([
            "rut"=>"required",
            "nombre"=>"required",
            "calle"=>"required",
            "numero"=>"required",
            "ciudad"=>"required",
            "comuna"=>"required|in:Ocasional,Regular,Frecuente,Embajadores",
            "telefonos"=>"required",
            "telefonos.*"=>"required"
        ], [
            'rut.required' => 'El rut es indispensable',
            'nombre.required' => 'Tu nombre es indispensable.',
            'calle.required' => 'Se necesita su dirección completa, le falta la calle.',
            'numero.required' => 'Se necesita su dirección completa, le falta el número.',
            'ciudad.required' => 'Se necesita su dirección completa, le falta la ciudad.',
            'comuna.required' => 'Se necesita su dirección completa, le falta la comuna.',
            'telefonos.*.required' => 'No dejes los campos de telefonos vacios.',
            'telefonos.required' => 'Ha de introducir un telefono.',
            'comuna.in' => 'Debe de ser uno de la lista: Ocasional, Regular, Frecuente, Embajadores.'
        ]);
        $cliente=Cliente::findOrFail($rut);
        $cliente-> update($request->all());
        return redirect ()->route('clientes.show',$cliente->rut)->with('Éxito', 'Cliente modificado correctamente');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $rut)
    {
        $cliente=Cliente::findOrFail($rut);// busco el libro con ese id
        
        $ventas = Venta::where('cliente_rut', $rut)->get();
        if($ventas){
            foreach ($ventas as $venta) {
                $venta->delete();
            }
        }
        $cliente -> delete();

        return redirect()->route('clientes.index')->with('Éxito', 'Cliente borrado correctamente');
    }
   
}
