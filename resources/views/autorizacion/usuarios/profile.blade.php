@extends('adminlte::page')

@section('title', 'Perfil de usuario')

@section('content_header')
    <!-- <h1>Perfil de usuario</h1> -->
@stop

@section('content')

<form method="post" action="{{ url('/profile/'.$usuario->id) }}" class="needs-validation" novalidate>

<x-adminlte-card title="Perfil de usuario" theme="{{ config('app.theme') }}" icon="fas fa-lg fa-edit">
    @method('PATCH')
    @csrf

    <div class="row">

      <div class="form-group col-4">
        <label for="">Tipo de documento de identidad</label>
        <input type="text"
          class="form-control" name="" id="" value="{{ $usuario->tipo_documento->descripcion }}" readonly>
      </div>

      <div class="form-group col-4">
        <label for="documento">Documento de identidad</label>
        <input type="text"
            class="form-control" name="documento" id="" value="{{ $usuario->documento }}" readonly>
      </div>

      <div class="form-group col-4">
        <label for="">Expedido en</label>
        <input type="text"
          class="form-control" name="" id="" value="{{ $usuario->documento_ubicacion->municipio.'('.$usuario->documento_ubicacion->dpto.')' }}" readonly>
      </div>

    </div>
    
    <div class="row">

      <div class="form-group col-3">
        <label for="name">Nombre 1</label>
        <input type="text"
            class="form-control" name="" id="" value="{{ $usuario->name1 }}" readonly>
        
      </div>

      <div class="form-group col-3">
        <label for="name">Nombre 2</label>
        <input type="text"
            class="form-control" name="" id="" value="{{ $usuario->name2 }}" readonly>
      </div>

      <div class="form-group col-3">
        <label for="lastname">Apellido 1</label>
        <input type="text"
            class="form-control" name="" id="" value="{{ $usuario->lastname1 }}" readonly>
      </div>

      <div class="form-group col-3">
        <label for="lastname2">Apellido 2</label>
        <input type="text"
            class="form-control" name="" id="" value="{{ $usuario->lastname2 }}" readonly>
      </div>

    </div>

    <div class="row">

      <div class="form-group col-4">
        <label for="">Rol</label>
        <input type="text"
          class="form-control" name="" id="" value="{{ $usuario->rol->name }}" readonly>
      </div>

      <div class="form-group col-4">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="text"
          class="form-control" name="" id="" value="{{ $usuario->fecha_nacimiento }}" readonly>
      </div>

      <div class="form-group col-4">
        <label for="">Género</label>
        <input type="text"
          class="form-control" name="" id="" value="{{ ($usuario->genero == 'F')? 'Femenino': 'Masculino' }}" readonly>
      </div>

    </div>


    <div class="row">

      <div class="form-group col-6">
        <label for="email">Correo electrónico</label>
        <input type="text"
            class="form-control" name="" id="" value="{{ $usuario->email }}" readonly>
      </div>

      <div class="form-group col-6">
        <label for="telefono">Teléfono</label>
        <input type="text"
            class="form-control" name="" id="" value="{{ $usuario->telefono }}" readonly>
      </div>

    </div>

    <div class="row">

      <div class="form-group col-8">
        <label for="direccion">Dirección</label>
        <input type="text"
            class="form-control" name="" id="" value="{{ $usuario->direccion }}" readonly>
      </div>

      <div class="form-group col-4">
        <label for="">Municipio</label>
        <input type="text"
          class="form-control" name="" id="" value="{{ $usuario->direccion_ubicacion->municipio.'('.$usuario->direccion_ubicacion->dpto.')' }}" readonly>
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
    
<a name="" id="" class="btn btn-secondary" href="{{ url('/home') }}" role="button">Cerrar</a>
<button type="submit" class="btn btn-primary float-right">Guardar</button>

</form>

<br>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop