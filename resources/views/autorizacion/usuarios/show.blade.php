@extends('adminlte::page')

@section('title', 'Ver usuario')

@section('content_header')
    <!-- <h1>Ver usuario</h1> -->
@stop

@section('content')

<x-adminlte-card title="Ver usuario" theme="{{ config('app.theme') }}" icon="fas fa-lg fa-info-circle">

    <div class="row">

      <div class="form-group col-4">
        <label for="tipo_documento_id">Tipo de documento de identidad</label>
        <input type="text"
          class="form-control" name="" id="" value="@if($usuario->tipo_documento){{ $usuario->tipo_documento->descripcion }}@endif" disabled>
      </div>

      <div class="form-group col-4">
        <label for="documento">Documento de identidad</label>
        <input type="text"
            class="form-control" name="documento" id="" value="{{ $usuario->documento }}" disabled>
      </div>

      <div class="form-group col-4">
        <label for="ubicacion">Expedido en</label>
        <input type="text"
            class="form-control" name="ubicacion" id="" value="{{ $usuario->documento_ubicacion->municipio.'('.$usuario->documento_ubicacion->dpto.')' }}" disabled>
      </div>

    </div>

    <div class="row">

      <div class="form-group col-6">
        <label for="name">Nombres</label>
        <input type="text"
            class="form-control" name="name" id="" value="{{ $usuario->name1.' '.$usuario->name2 }}" disabled>
      </div>

      <div class="form-group col-6">
        <label for="lastname">Apellidos</label>
        <input type="text"
            class="form-control" name="lastname" id="" value="{{ $usuario->lastname1.' '.$usuario->lastname2 }}" disabled>
      </div>

    </div>

    <div class="row">

      <div class="form-group col-4">
        <label for="default_role">Rol</label>
        <input type="text"
          class="form-control" name="" id="" value="{{ $usuario->rol->name }}" disabled>
      </div>

      <div class="form-group col-4">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date"
          class="form-control" name="fecha_nacimiento" id="" value="{{ $usuario->fecha_nacimiento }}" disabled>
      </div>     

      <div class="form-group col-4">
        <label for="genero">Género</label>
        <input type="text "
          class="form-control" name="genero" id="" value="@if($usuario->genero == 'F') Femenino @elseif($usuario->genero == 'M') Masculino @endif" disabled>
      </div>

    </div>

    <div class="row">

      <div class="form-group col-6">
        <label for="email">Correo electrónico</label>
        <input type="text"
            class="form-control" name="email" id="" value="{{ $usuario->email }}" disabled>
      </div>

      <div class="form-group col-6">
        <label for="telefono">Teléfono</label>
        <input type="text"
            class="form-control" name="telefono" id="" value="{{ $usuario->telefono }}" disabled>
      </div>

    </div>

    <div class="row">

      <div class="form-group col-8">
        <label for="direccion">Dirección</label>
        <input type="text"
            class="form-control" name="direccion" id="" value="{{ $usuario->direccion }}" disabled>
      </div>

      <div class="form-group col-4">
        <label for="direccion_ubicacion">Municipio</label>
        <input type="text"
            class="form-control" name="direccion_ubicacion" id="" value="{{ $usuario->direccion_ubicacion->municipio.'('.$usuario->direccion_ubicacion->dpto.')' }}" disabled>
      </div>

    </div>
    
</x-adminlte-card>

<a name="" id="" class="btn btn-secondary" href="{{ url('/usuarios') }}" role="button">Cerrar</a>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop