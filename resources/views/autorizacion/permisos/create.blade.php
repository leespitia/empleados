@extends('adminlte::page')

@section('title', 'Crear permiso')

@section('content_header')
    <h1>Crear permiso</h1>
@stop

@section('content')

<form method="post" action="{{ url('/permisos') }}">

    @csrf
    
    <div class="form-group">
      <label for="name">Permiso</label>
      <input type="text"
          class="form-control form-control-sm" name="name" id="" aria-describedby="helpId" placeholder="">
    </div>

    <div class="form-group">
      <label for="guard_name">Guard</label>
      <input type="text"
          class="form-control form-control-sm" name="guard_name" id="" aria-describedby="helpId" value="web">
    </div>

    <br>
    <a name="" id="" class="btn btn-secondary" href="{{ url('/permisos') }}" role="button">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop

