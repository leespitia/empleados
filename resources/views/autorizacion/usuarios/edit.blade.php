@extends('adminlte::page')

@section('title', 'Editar usuario')

@section('content_header')
    <!-- <h1>Editar usuario</h1> -->
@stop

@section('content')

<form method="post" action="{{ url('/usuarios/'.$usuario->id) }}" class="needs-validation" novalidate>

<x-adminlte-card title="Editar usuario" theme="{{ config('app.theme') }}" icon="fas fa-lg fa-edit">
    @method('PATCH')
    @csrf

    <div class="row">

      <div class="form-group col-4">
        <label for="tipo_documento_id">Tipo de documento de identidad</label>
        <select class="form-control" name="tipo_documento_id" id="">
          @if($usuario->tipo_documento)
          <option value="{{ $usuario->tipo_documento_id }}">{{ $usuario->tipo_documento->descripcion }}</option>
          @else
          <option value="">Seleccione un tipo de documento de identidad</option>
          @endif
          @foreach($tipoDocumentos as $tipoDocumento)
          <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->descripcion }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-4">
        <label for="documento">Documento de identidad</label>
        <input type="text"
            class="form-control" name="documento" id="" value="{{ $usuario->documento }}">
      </div>

      <div class="col-4">
        <x-adminlte-select2 name="documento_ubicacion_id" label="Expedido en" required>
            <option value="{{ $usuario->documento_ubicacion_id }}">{{ $usuario->documento_ubicacion->municipio.'('.$usuario->documento_ubicacion->dpto.')' }}</option>
            @foreach($municipios as $municipio)
            <option value="{{ $municipio->id }}">{{ $municipio->municipio.'('.$municipio->dpto.')' }}</option>
            @endforeach
        </x-adminlte-select2>
      </div>

    </div>
    
    <div class="row">

      <div class="form-group col-3">
        <label for="name">Nombre 1</label>
        <input type="text"
            class="form-control" name="name1" id="" value="{{ $usuario->name1 }}" required>
        
      </div>

      <div class="form-group col-3">
        <label for="name">Nombre 2</label>
        <input type="text"
            class="form-control" name="name2" id="" value="{{ $usuario->name2 }}">
      </div>

      <div class="form-group col-3">
        <label for="lastname">Apellido 1</label>
        <input type="text"
            class="form-control" name="lastname1" id="" value="{{ $usuario->lastname1 }}" required>
      </div>

      <div class="form-group col-3">
        <label for="lastname2">Apellido 2</label>
        <input type="text"
            class="form-control" name="lastname2" id="" value="{{ $usuario->lastname2 }}">
      </div>

    </div>

    <div class="row">

      <div class="form-group col-4">
        <label for="default_role">Rol</label>
        <select class="form-control" name="default_role" id="" required>
        <option value="{{ $usuario->default_role }}">{{ $usuario->rol->name }}</option>
          @foreach($usuario->roles as $role)
          <option value="{{ $role->id }}">{{ $role->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group col-4">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date"
          class="form-control" name="fecha_nacimiento" id="" value="{{ $usuario->fecha_nacimiento }}">
      </div>
      
      <div class="form-group col-4">
        <label for="genero">Género</label>
        <select class="form-control" name="genero" id="" required>
          <option value="">Seleccione un género</option>
          <option value="F" {{ ($usuario->genero == 'F')? 'selected': '' }}>Femenino</option>
          <option value="M" {{ ($usuario->genero == 'M')? 'selected': '' }}>Masculino</option>
        </select>
      </div>

    </div>


    <div class="row">

      <div class="form-group col-6">
        <label for="email">Correo electrónico</label>
        <input type="text"
            class="form-control" name="email" id="" value="{{ $usuario->email }}" required>
      </div>

      <div class="form-group col-6">
        <label for="telefono">Teléfono</label>
        <input type="text"
            class="form-control" name="telefono" id="" value="{{ $usuario->telefono }}">
      </div>

    </div>

    <div class="row">

      <div class="form-group col-8">
        <label for="direccion">Dirección</label>
        <input type="text"
            class="form-control" name="direccion" id="" value="{{ $usuario->direccion }}">
      </div>

      <div class="col-4">
        <x-adminlte-select2 name="direccion_ubicacion_id" label="Municipio">
            <option value="{{ $usuario->direccion_ubicacion_id }}">{{ $usuario->direccion_ubicacion->municipio.'('.$usuario->direccion_ubicacion->dpto.')' }}</option>
            @foreach($municipios as $municipio)
            <option value="{{ $municipio->id }}">{{ $municipio->municipio.'('.$municipio->dpto.')' }}</option>
            @endforeach
        </x-adminlte-select2>
      </div>

    </div>

    <div class="row">

      <div class="form-group col-6">
        <label for="password">Contraseña</label>
        <input type="password"
            class="form-control" name="password" id="">
      </div>

      <div class="form-group col-6">
        <label for="password_confirmation">Confirmar contraseña</label>
        <input type="password"
            class="form-control" name="password_confirmation" id="">
      </div>

    </div>

</x-adminlte-card>
    
<a name="" id="" class="btn btn-secondary" href="{{ url('/usuarios') }}" role="button">Cerrar</a>
<button type="submit" class="btn btn-primary float-right">Guardar</button>

</form>

<br>

<x-adminlte-card title="Roles" theme="{{ config('app.theme') }}" icon="fas fa-lg fa-list">

@if($roles->count() > 0)
<form method="post" action="{{ url('/usuarios/'.$usuario->id.'/roles') }}">

    @csrf
    <div class="row">
        <div class="form-group col-4">
            <select class="form-control" name="role" id="">
                <option value="">Seleccione el Rol que desea asignar</option>
                @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-2">
            <button type="submit" class="btn btn-primary">Agregar rol</button>
        </div>
    </div>
</form>

@endif

@if($usuario->roles->count() > 0)

<div class="col-6">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>Permiso</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
                @foreach($usuario->roles as $role)
                <tr>
                    <td scope="row">{{ $role->name }}</td>
                    <td>
                        <form method="post" action="{{ url('/usuarios/'.$usuario->id.'/roles/'.$role->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="role" value="{{ $role->id }}">
                            <button type="submit" class="btn btn-sm btn-primary del_rol">-</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>    
</div>

@else

<h5>El usuario <b>{{ $usuario->name }}</b> no tiene roles asignados!!!</h5>

@endif

</x-adminlte-card>

<br>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop