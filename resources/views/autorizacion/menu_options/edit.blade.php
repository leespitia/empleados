@extends('adminlte::page')

@section('title', 'Crear permiso')

@section('content_header')
  <h1>Editar opción de menú</h1>
@stop

@section('content')

<form method="post" action="{{ url('/menu_options/'.$menuOption->id) }}">

    @csrf
    @method('PATCH')
    
    <div class="form-group">
      <label for="name">Opción de menú</label>
      <input type="text"
          class="form-control form-control-sm" name="name" id="" aria-describedby="helpId" placeholder="" value="{{ $menuOption->name }}">
    </div>

    <div class="form-group">
      <label for="menu_option_id">Depende de</label>
      <select class="form-control" name="menu_option_id" id="">
        @if($menuOption->menu_option_id == NULL)
            <option value="">Seleccione la opción de la cual depende</option>
        @else
            <option value="{{ $menuOption->menu_option_id }}">{{ $menuOption->menu_option->name }}</option>
        @endif
        @foreach($menuOptions as $mo)
        <option value="{{ $mo->id }}">{{ $mo->name }}</option>
        @endforeach
        <option value="">Ninguno</option>
      </select>
    </div>

    <div class="form-group">
      <label for="permission_id">Permiso</label>
      <select class="form-control" name="permission_id" id="">
        <option value="{{ $menuOption->permission_id }}">{{ $menuOption->permission->name }}</option>
        @foreach($permisos as $permiso)
        <option value="{{ $permiso->id }}">{{ $permiso->name }}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group">
      <label for="ruta">Ruta</label>
      <input type="text"
          class="form-control form-control-sm" name="ruta" id="" aria-describedby="helpId" value="{{ $menuOption->ruta }}">
    </div>

    <div class="form-group">
      <label for="icono">Ícono</label>
      <input type="text"
          class="form-control form-control-sm" name="icono" id="" aria-describedby="helpId" value="{{ $menuOption->icono }}">
    </div>

    
    <div class="form-check">
      <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="activo" id="" value="checkedValue" {{ ($menuOption->activo)? 'checked': ''  }}>
        Activo
      </label>
    </div>

    <br>
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
