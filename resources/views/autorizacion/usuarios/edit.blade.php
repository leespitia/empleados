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

    <div class="container text-center">

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="tipo_documento_id" class="col-form-label">Tipo de documento</label>
        </div>
        <div class="col-auto">
          <select class="form-control" name="tipo_documento_id" id="tipo_documento_id" required>
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
      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="documento" class="col-form-label">Documento</label>
        </div>
        <div class="col-auto">
          <input type="number" class="form-control" name="documento" id="documento" value="{{ $usuario->documento }}" placeholder="Documento de identidad" required>
        </div>
      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="documento_ubicacion_id" class="col-form-label">Expedido en</label>
        </div>
        <div class="col-auto">
          <x-adminlte-select2 name="documento_ubicacion_id" class="form-control" enable-old-support required>
            <option value="{{ $usuario->documento_ubicacion_id }}">{{ $usuario->documento_ubicacion->municipio.'('.$usuario->documento_ubicacion->dpto.')' }}</option>
            @foreach($municipios as $municipio)
            <option value="{{ $municipio->id }}">{{ $municipio->municipio.'('.$municipio->dpto.')' }}</option>
            @endforeach
          </x-adminlte-select2>
        </div>
      </div>

      <div class="row">

        <div class="col-3 input-group mb-2">
          <label for="documento_ubicacion_id" class="col-form-label">Nombre</label>
        </div>

        <div class="col">
          <input type="text" class="form-control" name="name1" id="name1" value="{{ $usuario->name1 }}" placeholder="Nombre 1" required>
        </div>

        <div class="col">
          <input type="text" class="form-control" name="name2" id="name2" value="{{ $usuario->name2 }}" placeholder="Nombre 2">
        </div>

        <div class="col">
          <input type="text" class="form-control" name="lastname1" id="lastname1" value="{{ $usuario->lastname1 }}" placeholder="Apellido 1" required>
        </div>

        <div class="col">
          <input type="text" class="form-control" name="lastname2" id="lastname2" value="{{ $usuario->lastname2 }}" placeholder="Apellido 2">
        </div>

      </div>

      <div class="row">

        <div class="col-3 input-group mb-2">
          <label for="default_role" class="col-form-label">Rol</label>
        </div>

        <div class="col-auto">
          <select class="form-control" name="default_role" id="default_role" required>
            <option value="{{ $usuario->default_role }}">{{ $usuario->rol->name }}</option>
            @foreach($usuario->roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="fecha_nacimiento" class="col-form-label">Fecha de nacimiento</label>
        </div>
        <div class="col-auto">
          <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $usuario->fecha_nacimiento }}">
        </div>
      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="genero" class="col-form-label">Género</label>
        </div>
        <div class="col-auto">
          <select class="form-control" name="genero" id="genero" required>
            <option value="">Seleccione un género</option>
            <option value="F" {{ ($usuario->genero == 'F')? 'selected': '' }}>Femenino</option>
            <option value="M" {{ ($usuario->genero == 'M')? 'selected': '' }}>Masculino</option>
          </select>
        </div>
      </div>

      <div class="row">

        <div class="col-3 input-group mb-2">
          <label for="email" class="col-form-label">Correo electrónico</label>
        </div>
        <div class="col-auto">
          <input type="text" class="form-control" name="email" id="email" value="{{ $usuario->email }}" required>
        </div>

      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="telefono" class="col-form-label">Teléfono</label>
        </div>
        <div class="col-auto">
          <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $usuario->telefono }}" required>
        </div>

      </div>

      <div class="row">

        <div class="col-3 input-group mb-2">
          <label for="direccion" class="col-form-label">Dirección</label>
        </div>
        <div class="col-auto">
          <input type="text" class="form-control" name="direccion" id="direccion" value="{{ $usuario->direccion }}" required>
        </div>
      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="direccion_ubicacion_id" class="col-form-label">Municipio</label>
        </div>
        <div class="col-auto">
          <x-adminlte-select2 name="direccion_ubicacion_id" enable-old-support>
            <option value="{{ $usuario->direccion_ubicacion_id }}">{{ $usuario->direccion_ubicacion->municipio.'('.$usuario->direccion_ubicacion->dpto.')' }}</option>
            @foreach($municipios as $municipio)
            <option value="{{ $municipio->id }}">{{ $municipio->municipio.'('.$municipio->dpto.')' }}</option>
            @endforeach
          </x-adminlte-select2>
        </div>

      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="password" class="col-form-label">Contraseña</label>
        </div>
        <div class="col-auto">
          <input type="password" class="form-control" name="password" id="password">
        </div>
      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="password_confirmation" class="col-form-label">Confirmar contraseña</label>
        </div>
        <div class="col-auto">
          <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>

      </div>

      <hr>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="departamento_id" class="col-form-label">Departamento</label>
        </div>
        <div class="col-auto">
          <select class="form-control" name="departamento_id" id="departamento_id" required>
            <option value="">Seleccione un departamento</option>
            @foreach($departamentos as $departamento)
            <option value="{{ $departamento->id }}">{{ $departamento->descripcion }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="cargo_id" class="col-form-label">Cargo</label>
        </div>
        <div class="col-auto">
          <select class="form-control" name="cargo_id" id="cargo_id" required>
            <option value="">Seleccione un cargo</option>
            @foreach($cargos as $cargo)
            <option value="{{ $cargo->id }}">{{ $cargo->descripcion }}</option>
            @endforeach
          </select>
        </div>
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