@extends('cliente.master')

@section('titulopagina')
    Detalle del Cliente
@endsection

@section('contenido')
   

    <div class="card">
        <div class="card-header">
            <h2>Detalles del Cliente: {{ $cliente->nombre }}</h2>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nombre:</strong> {{ $cliente->nombre }}</li>
                <li class="list-group-item"><strong>RUT:</strong> {{ $cliente->rut }}</li>
                <li class="list-group-item"><strong>Teléfonos:</strong>
                    <ul>
                        @foreach (json_decode($cliente->telefonos) as $telefono)
                            <li>{{ $telefono }}</li>
                        @endforeach
                    </ul>
                </li>
                <li class="list-group-item"><strong>Calle:</strong> {{ $cliente->calle }}</li>
                <li class="list-group-item"><strong>Ciudad:</strong> {{ $cliente->ciudad }}</li>
                <li class="list-group-item"><strong>Número:</strong> {{ $cliente->numero }}</li>
                <li class="list-group-item"><strong>Comuna:</strong> {{ $cliente->comuna }}</li>
            </ul>
            
        </div>
        
    </div>
    <br>
    <a class="btn btn-primary" href="{{ route('clientes.index') }}">Volver al Listado</a>
@endsection
