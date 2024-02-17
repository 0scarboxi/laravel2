@extends('cliente.master')

@section('titulopagina')
    Editar los datos de Cliente
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
<form action="{{ route('clientes.update',$cliente->rut)}}" method="post">
@method('PUT') 
@csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" name="rut" type="text" value="{{ $cliente->rut ?? old('rut')}}" >
                                <label for="rut">RUT</label>
                                @error('rut')
                                @enderror
            
                            </div>
                            <div class="form-floating mb-3">
                            <input class="form-control" name="nombre" type="text" value="{{ $cliente->nombre ?? old('nombre')}}" >
                                <label for="nombre">Nombre</label>
                                @error('nombre')
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="calle" type="text" value="{{ $cliente->calle ?? old('calle')}}" require>
                                <label for="calle">Calle</label>
                                @error('calle')
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="numero" type="integer" value="{{ $cliente->numero ?? old('numero')}}" require>
                                <label for="numero">Número</label>
                                @error('numero')
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="ciudad" type="text" value="{{ $cliente->ciudad ?? old('ciudad')}}" require>
                                <label for="ciudad">Ciudad</label>
                                @error('ciudad')
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" name="comuna" type="text" value="{{ $cliente->comuna ?? old('comuna')}}" require>
                                <label for="comuna">Comuna</label>
                                @error('comuna')
                                @enderror
                            </div>
                            <div id="telefonos">
    @foreach(json_decode($cliente->telefonos ?? old('telefonos')) as $telefono)
        <input type="tel" class="form-control" name="telefonos[]" placeholder="{{ $telefono }}" value="{{ $telefono }}">
    @endforeach
</div>
            <button type="button" onclick="nuevoTelefono()">Introduzca un número de telefono</button>
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
                            <br>
                            <br>
                            <!-- Submit Button-->
                             <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                             <a style="margin-left:50%;" class="btn btn-primary" href="/clientes">Volver</a>
                        </form>
                        <br>
                        
                        <br>
                        <br>
@endsection