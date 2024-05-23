@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Roles</h1>
@stop

@section('content')

<a name="" id="" class="btn btn-primary" href="{{ url('/roles/create') }}" role="button">Crear rol</a>

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

foreach($roles as $rol){

    $btnEdit = '<a href="'.url('/roles/'.$rol->id.'/edit').'">
                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>
                </a>';
    $btnDelete = '<a href="#">
                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                    <i class="fa fa-lg fa-fw fa-trash"></i>
                    </button>
                </a>';
    $btnDetails = '<a href="'.url('/roles/'.$rol->id).'">
                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalles">
                    <i class="fa fa-lg fa-fw fa-eye"></i>
                    </button>
                    </a>';

    array_push($datos, [$rol->id, $rol->name, $rol->guard_name, '<nobr>'.$btnDetails.$btnEdit.'</nobr>']);

}

$config = [
    'data' => $datos,
    'order' => [[1, 'asc']],
    'columns' => [null, null, null, ['orderable' => false]],
];
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

