@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <h1>Permisos</h1>
@stop

@section('content')

<a name="" id="" class="btn btn-primary" href="{{ url('/permisos/create') }}" role="button">Crear permiso</a>

<br><br>

<div class="container">

{{-- Setup data for datatables --}}
@php
$heads = [
    'ID',
    'Descripción',
    ['label' => 'Guardia', 'width' => 40],
    ['label' => 'Acciones', 'no-export' => true, 'width' => 5],
];

$datos = array();

foreach($permisos as $permiso){

    $btnEdit = '<a href="'.url('/permisos/'.$permiso->id.'/edit').'">
                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>
                </a>';
    $btnDelete = '<a href="#">
                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                </a>';
    $btnDetails = '<a href="'.url('/permisos/'.$permiso->id).'">
                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalles">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                    </button>
                    </a>';

    array_push($datos, [$permiso->id, $permiso->name, $permiso->guard_name, '<nobr>'.$btnEdit.'</nobr>']);

}

$config = [
    'data' => $datos,
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
$config["lengthMenu"] = [ 50, 75, 100, 500];
@endphp

{{-- Minimal example / fill data using the component slot --}}
<x-adminlte-datatable id="table5" :heads="$heads" :config="$config" theme="light" striped hoverable/>
   

</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- <script> console.log('Hi!'); </script> -->
@stop

