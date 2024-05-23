@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <!-- <h1>Usuarios</h1> -->
@stop

@section('content')

<x-adminlte-card title="Usuarios" theme="{{ config('app.theme') }}" icon="fas fa-lg fa-list">

    <a name="" id="" class="btn btn-primary" href="{{ url('/usuarios/create') }}" role="button">Crear usuario</a>

    <br><br>

    <table class="table table-striped table-inverse" 
        data-toggle="table" data-sticky-header="true" data-search="true" 
        data-show-columns="true" data-show-toggle="true" 
        data-show-columns-toggle-all="true" data-show-print="true"
        data-show-export="true" data-export-types="['csv','excel','pdf']"
        data-cookie="true" data-cookie-id-table="saveId" data-show-print="true">
    <thead class="thead-inverse">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Rol</th>
            <th>Correo electrónico</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre() }}</td>
                <td>{{ $usuario->rol->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ ($usuario->activo)? 'Activo': 'Inactivo' }}</td>
                <td>M | V | E</td>
            </tr>
            @endforeach            
        </tbody>
</table>

</x-adminlte-card>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop
