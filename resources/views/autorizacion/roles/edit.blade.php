@extends('adminlte::page')

@section('title', 'Editar rol')

@section('content_header')
    <h1>Editar rol</h1>
@stop

@section('content')

<h1>Editar rol</h1>

<form method="post" action="{{ url('/roles/'.$role->id) }}" class="needs-validation" novalidate>

    @method('PATCH')
    @csrf
    
    <div class="form-group">
      <label for="name">Rol</label>
      <input type="text"
          class="form-control form-control-sm" name="name" id="" aria-describedby="helpId" value="{{ $role->name }}" required>
    </div>

    <div class="form-group">
      <label for="guard_name">Guard</label>
      <input type="text"
          class="form-control form-control-sm" name="guard_name" id="" aria-describedby="helpId" value="{{ $role->guard_name }}" required>
    </div>

    <br>
    <a name="" id="" class="btn btn-secondary" href="{{ url('/roles') }}" role="button">Cancelar</a>
    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

<hr>

<h2>Permisos</h2>

@if($permisos->count())
<form method="post" action="{{ url('/roles/'.$role->id.'/permisos') }}" class="needs-validation" novalidate>
    @csrf

    <div class="row">
        <div class="form-group col-4">
            <select class="form-control" name="permiso" id="" required>
                <option value="">Seleccione el permiso que desea asignar</option>
                @foreach($permisos as $permiso)
                <option value="{{ $permiso->id }}">{{ $permiso->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-2">
            <button type="submit" class="btn btn-primary">Agregar permiso</button>
        </div>
    </div>
</form>
<br>
@endif

@if($role->permissions->count())

<div class="col-6">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>Permiso</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
                @foreach($role->permissions as $permiso)
                <tr>
                    <td scope="row">{{ $permiso->name }}</td>
                    <td>
                        <form method="post" action="{{ url('/roles/'.$role->id.'/permisos/'.$permiso->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="permiso" value="{{ $permiso->id }}">
                            <button type="submit" class="btn btn-sm btn-primary del_rol">-</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
    </table>    
</div>

@else

<x-adminlte-alert theme="warning" title="Advertencia">
    <p>El rol <b>{{ $role->name }}</b> no tiene permisos asignados!!!</p>
</x-adminlte-alert>

@endif

<br>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop
