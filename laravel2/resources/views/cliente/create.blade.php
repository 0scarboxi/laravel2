@extends('cliente.master')

@section('titulopagina')
   Crear Nuevo Cliente
@endsection

@section('contenido')
<br>
<br>

@if($errors->any())
    @foreach($errors->all() as $error)
        <pre>
            {{$error}}
        </pre>
    @endforeach
@endif
        <br>
        <form action="{{ route('clientes.store') }}" method="post">
            @csrf
            
            <div class="form-floating mb-3">
                <input class="form-control" name="nombre" type="text" value="{{ old('nombre') }}"/>
                <label for="nombre">Nombre</label>
            </div>
            
            <div class="form-floating mb-3">
                <input class="form-control" name="rut" type="text" value="{{ old('rut') }}" />
                <label for="rut">RUT</label>
            </div>
            
            <div class="form-floating mb-3">
                <input class="form-control" name="calle" type="text" value="{{ old('calle') }}" />
                <label for="calle">Calle</label>
            </div>
            
            <div class="form-floating mb-3">
                <input class="form-control" name="numero" type="text" value="{{ old('numero') }}" />
                <label for="numero">Número</label>
            </div>
            
            <div class="form-floating mb-3">
                <input class="form-control" name="ciudad" type="text" value="{{ old('ciudad') }}" />
                <label for="ciudad">Ciudad</label>
            </div>
            
            <div class="form-group">{{-- form-floating mb-3 --}}
                <label for="comuna">Comuna</label>
                <select id="lista"  class="form-control" name="comuna">
                    <option value="Ocasional" @if(old('comuna') == 'Ocasional') selected @endif>Ocasional</option>
                    <option value="Regular" @if(old('comuna') == 'Regular') selected @endif>Regular</option>
                    <option value="Frecuente" @if(old('comuna') == 'Frecuente') selected @endif>Frecuente</option>
                    <option value="Embajadores" @if(old('comuna') == 'Embajadores') selected @endif>Embajadores</option>
                </select>
            </div>

            <div id="telefonos">

            </div>
            <button type="button" onclick="nuevoTelefono()">Introduzca un número de telefono</button>

            <button class="btn btn-primary" type="submit">Crear Cliente</button>
            <script>
                let telefonoCount=0;
            function nuevoTelefono() {
                const divTelefonos = document.getElementById('telefonos');
                const input = document.createElement('input');
                input.type = 'tel';
                input.name = 'telefonos[]';
                telefonoCount++;
                input.placeholder = 'Número de telefono '+telefonoCount;
                divTelefonos.appendChild(input);
            }
            </script>
        </form>
        <br>
                        
                        <br>
                        <br>
@endsection