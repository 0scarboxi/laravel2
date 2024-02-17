@extends('venta.master')

@section('titulopagina')
    Listado General de clientes
@endsection

@section('contenido')

@if(session('exito'))
<br>
<div class="alert alert-success">
    {{ session('exito')}}
</div>
@endif

<table class="table">
    <thead class="table-dark">
        <tr>
            <td>ID</td>
            <td>Cliente Rut</td>
            <td>Fecha</td>
            <td>Descuento</td>
            <td>Monto_final</td>
            <td></td>
            <td></td>
        </tr>
    </thead>

    <tbody>
    @forelse($ventas as $venta)
        <tr>
            <td>{{ $venta->id }}</td>
            <td>{{ $venta->cliente_rut }}</td>
            <td>{{ $venta->fecha }}</td>
            <td>{{ $venta->descuento }}</td>
            <td>{{ $venta->monto_final }}</td>
           <td>
                <form action="{{ route('ventas.destroy',$venta->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('¿Deseas Borrarlo?');" type="submit">Borrar</button>
                </form> 
            </td>
        </tr>
    @empty
        <div class="alert alert-danger">
            No se han encontrado clientes.
        </div>
    @endforelse
</tbody>

    
</table>
@endsection
