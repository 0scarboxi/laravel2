@extends('venta.master')

@section('titulopagina')
    Listado General de ventas
@endsection

@section('contenido')

@if(session('exito'))
<br>
<div class="alert alert-success">
    {{ session('exito')}}
</div>
@endif
<div class="card-header">
            <h2>Ventas del Cliente: {{$cliente->nombre}}</h2>
        </div>
<table class="table">
    <thead class="table-dark">
        <tr>
            <td>ID</td>
            <td>Fecha</td>
            <td>Cliente</td>
            <td>Descuento</td>
            <td>Monto final</td>
            <td></td>
        </tr>
    </thead>

    <tbody>
    @forelse($ventas as $venta)
        <tr>
            <td>{{ $venta->id }}</td>
            <td>{{ $venta->fecha }}</td>
            <td>{{ $venta->cliente->rut }}</td>
            <td>{{ $venta->descuento }}</td>
            <td>{{ $venta->monto_final }}</td>
            <td>
            </td>
        </tr>
        
    @empty
        <div class="alert alert-danger">
            No se han encontrado ventas.
        </div>
    @endforelse
    
</tbody>

    
</table>
<a class="btn btn-primary" href="{{ route('clientes.index') }}">Volver al Listado</a>
@endsection
