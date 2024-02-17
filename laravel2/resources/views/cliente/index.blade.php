@extends('cliente.master')

@section('titulopagina')
    Listado General de clientes
@endsection

@section('contenido')
<br>
<a class="btn btn-primary" href="{{ route('clientes.create') }}">Crear Cliente</a>
<a class="btn btn-primary" href="{{ route('ventas.index') }}">Mostrar todas las ventas</a>

<br>
<br>

@if(session('exito'))
<br>
<div class="alert alert-success">
    {{ session('exito')}}
</div>
@endif

<table class="table">
    <thead class="table-dark">
        <tr>
            <td>Nombre</td>
            <td>RUT</td>
            <td>Teléfonos</td>
            <td>Calle</td>
            <td>Ciudad</td>
            <td>Número</td>
            <td>Comuna</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </thead>

    <tbody>
    @forelse($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->rut }}</td>
            <td>
                @foreach (json_decode($cliente->telefonos) as $telefono)
                    <div>{{ $telefono }}</div>
                @endforeach
                </td>
            <td>{{ $cliente->calle }}</td>
            <td>{{ $cliente->ciudad }}</td>
            <td>{{ $cliente->numero }}</td>
            <td>{{ $cliente->comuna }}</td>
            <td><a class="btn btn-primary" href="/clientes/{{ $cliente->rut }}">Mostrar</a></td>
            <td><a class="btn btn-primary" href="/ventas/{{ $cliente->rut }}">Mostrar ventas</a></td>
            <td><a class="btn btn-primary" href="/clientes/{{ $cliente->rut }}/edit">Editar</a></td>
            <td>
                <form action="{{ route('clientes.destroy',$cliente->rut) }}" method="post">
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
