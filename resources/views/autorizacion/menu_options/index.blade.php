@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <h1>Opciones de menú</h1>
@stop

@section('content')

<x-adminlte-card title="Usuarios" theme="{{ config('app.theme') }}" icon="fas fa-lg fa-list">

    <a name="" id="" class="btn btn-primary" href="{{ url('/menu_options/create') }}" role="button">Crear opción de menú</a>

    <br><br>

    <!-- <table class="table table-striped table-inverse table-responsive"> -->
    <table class="table table-striped table-inverse" 
            data-toggle="table" data-sticky-header="true" data-search="true" 
            data-show-columns="true" data-show-toggle="true" 
            data-show-columns-toggle-all="true" data-show-print="true"
            data-show-export="true" data-export-types="['csv','excel','pdf']"
            data-cookie="true" data-cookie-id-table="saveId" data-show-print="true">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Opción de menú</th>
                <th>Ruta</th>
                <th>Permiso</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                @if ($menuOptions->count() > 0)
                    @foreach ($menuOptions as $menuOption)
                        @include('autorizacion.partials.menuOption', $menuOption)
                    @endforeach
                @else
                    @include('autorizacion.partials.menuOption-none')
                @endif
            </tbody>
    </table>

    <br>

</x-adminlte-card>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop
