@extends('adminlte::page')

@section('title', 'Crear rol')

@section('content_header')
    <h1>Crear rol</h1>
@stop

@section('content')

<form method="post" action="{{ url('/roles') }}">

    @csrf
    
    <div class="form-group">
      <label for="name">Rol</label>
      <input type="text"
          class="form-control form-control-sm" name="name" id="" aria-describedby="helpId" placeholder="">
    </div>

    <div class="form-group">
      <label for="guard_name">Guard</label>
      <input type="text"
          class="form-control form-control-sm" name="guard_name" id="" aria-describedby="helpId" value="web">
    </div>

    <br>
    <a name="" id="" class="btn btn-secondary" href="{{ url('/roles') }}" role="button">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>

</form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop


