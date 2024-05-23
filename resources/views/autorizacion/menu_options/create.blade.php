@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
  <h1>Crear opción de menú</h1>
@stop

@section('content')

<form method="post" action="{{ url('/menu_options') }}">

    @csrf
    
    <div class="form-group">
      <label for="name">Opción de menú</label>
      <input type="text"
          class="form-control form-control-sm" name="name" id="" aria-describedby="helpId" placeholder="" value="{{ old('name') }}">
    </div>

    <div class="form-group">
      <label for="menu_option_id">Depende de</label>
      <select class="form-control" name="menu_option_id" id="">
        <option value="">Seleccione la opción de la cual depende</option>
        @foreach($menuOptions as $menuOption)
        <option value="{{ $menuOption->id }}">{{ $menuOption->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="permission_id">Permiso</label>
      <select class="form-control" name="permission_id" id="">
        <option value="">Seleccione el permiso de la opción de menú</option>
        @foreach($permisos as $permiso)
        <option value="{{ $permiso->id }}">{{ $permiso->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="ruta">Ruta</label>
      <input type="text"
          class="form-control form-control-sm" name="ruta" id="" aria-describedby="helpId" value="{{ old('ruta') }}">
    </div>

    <div class="form-group">
      <label for="icono">Ícono</label>
      <input type="text"
          class="form-control form-control-sm" name="icono" id="" aria-describedby="helpId" value="{{ old('icono') }}">
    </div>

    <br>
    <a name="" id="" class="btn btn-secondary" href="{{ url('/menu_options') }}" role="button">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

<br>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop
