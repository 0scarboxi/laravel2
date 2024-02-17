<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores=Proveedor::all(); 
        if(!session('contador')){
            session(['contador'=>0]);// establezco la variable contador
        }
        return view('proveedor.index',compact('proveedores'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rut' => ['required', 'unique:tabla_rut', 'regex:/[0-9]{8}-[0-9kK]{1}/'],
            'nombre' => ['required', 'string'],
            'web' => ['nullable', 'url'],
            'telefono' => ['nullable', 'string'],
            'calle' => ['nullable', 'string'],
            'numero' => ['nullable', 'integer', 'between:1,100']
        ], [
            'rut.required' => 'El campo rut es obligatorio.',
            'rut.unique' => 'El rut ya está en uso.',
            'rut.regex' => 'El formato del rut no es válido.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de caracteres.',
            'web.url' => 'La URL del sitio web no es válida.',
            'telefono.string' => 'El campo teléfono debe ser una cadena de caracteres.',
            'calle.string' => 'El campo calle debe ser una cadena de caracteres.',
            'numero.integer' => 'El campo número debe ser un número entero.',
            'numero.between' => 'El campo número debe estar entre 1 y 100.'
        ]);
        $datos = $request->all();
        //  dd($datos); 
        $proveedor=Proveedor::create($datos);// crea y guarda en la base de datos un nuevo objeto de tipo libro
        // $id= Book::max();
        return Redirect ("/proveedores/" .$proveedor->id)->with('Éxito', 'Proveedor creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
