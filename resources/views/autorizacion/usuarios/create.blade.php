@extends('adminlte::page')

@section('title', 'Crear usuario')

@section('content_header')
<!-- <h1>Crear usuario</h1> -->
@stop

@section('content')

<form method="post" action="{{ url('/usuarios') }}" class="needs-validation" novalidate>

  <x-adminlte-card title="Crear usuario" theme="{{ config('app.theme') }}" icon="fas fa-lg fa-plus">

    @csrf

    <div class="container text-center">

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="tipo_documento_id" class="col-form-label">Tipo de documento</label>
        </div>
        <div class="col-auto">
          <select class="form-control" name="tipo_documento_id" id="tipo_documento_id" required>
            <option value="">Seleccione un tipo de documento de identidad</option>
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
          <input type="number" class="form-control" name="documento" id="documento" value="{{ old('documento') }}" placeholder="Documento de identidad" required>
        </div>
      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="documento_ubicacion_id" class="col-form-label">Expedido en</label>
        </div>
        <div class="col-auto">
          <x-adminlte-select2 name="documento_ubicacion_id" required>
            <option value="">Seleccione un municipio</option>
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
          <input type="text" class="form-control" name="name1" id="" value="{{ old('name1') }}" placeholder="Nombre 1" required>
        </div>

        <div class="col">
          <input type="text" class="form-control" name="name2" id="" value="{{ old('name2') }}" placeholder="Nombre 2">
        </div>

        <div class="col">
          <input type="text" class="form-control" name="lastname1" id="" value="{{ old('lastname1') }}" placeholder="Apellido 1" required>
        </div>

        <div class="col">
          <input type="text"
              class="form-control" name="lastname2" id="" value="{{ old('lastname2') }}" placeholder="Apellido 2">
        </div>

      </div>

      <div class="row">

        <div class="col-3 input-group mb-2">
          <label for="default_role" class="col-form-label">Rol</label>
        </div>

        <div class="col-auto">
          <select class="form-control" name="default_role" id="" required>
            <option value="">Seleccione un rol para el usuario</option>
            @foreach($roles as $role)
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
          <input type="date" class="form-control" name="fecha_nacimiento" id="" value="{{ old('fecha_nacimiento') }}">
        </div>
      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="genero" class="col-form-label">Género</label>
        </div>
        <div class="col-auto">
          <select class="form-control" name="genero" id="" required>
            <option value="">Seleccione un género</option>
            <option value="F">Femenino</option>
            <option value="M">Masculino</option>
          </select>
        </div>
      </div>

      <div class="row">

        <div class="col-3 input-group mb-2">
          <label for="email" class="col-form-label">Correo electrónico</label>
        </div>
        <div class="col-auto">
          <input type="text" class="form-control" name="email" id="" value="{{ old('email') }}" required>
        </div>

      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="telefono" class="col-form-label">Teléfono</label>
        </div>
        <div class="col-auto">
          <input type="text" class="form-control" name="telefono" id="" value="{{ old('telefono') }}" required>
        </div>

      </div>

      <div class="row">

        <div class="col-3 input-group mb-2">
          <label for="direccion" class="col-form-label">Dirección</label>
        </div>
        <div class="col-auto">
          <input type="text" class="form-control" name="direccion" id="" value="{{ old('direccion') }}">
        </div>
      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="direccion_ubicacion_id" class="col-form-label">Municipio</label>
        </div>
        <div class="col-auto">
          <x-adminlte-select2 name="direccion_ubicacion_id">
            <option value="">Seleccione un municipio</option>
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
          <input type="password" class="form-control" name="password" id="password" required>
        </div>
      </div>

      <div class="row">
        <div class="col-3 input-group mb-2">
          <label for="password_confirmation" class="col-form-label">Confirmar contraseña</label>
        </div>
        <div class="col-auto">
          <input type="password" class="form-control" name="password_confirmation" id="" required>
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

  <a name="" id="" class="btn btn-secondary" href="{{ url('/usuarios') }}" role="button">Cancelar</a>
  <button type="submit" class="btn btn-primary float-right">Guardar</button>

</form>

<br>

@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
<!-- <script> console.log('Hi!'); </script> -->
@stop