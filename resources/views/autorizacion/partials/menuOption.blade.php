<tr>
    <td>{{ $menuOption->id }}</td>
    <td>{{ $menuOption->nivel().' '.$menuOption->name }}</td>
    <td>{{ $menuOption->ruta }}</td>
    <td>{{ $menuOption->permission->name }}</td>
    <td>{{ ($menuOption->activo)? 'Activo': 'Inactivo' }}</td>
    <td><a href="{{ url('/menu_options/'.$menuOption->id.'/edit') }}">Editar</a></td>
</tr>
@if ($menuOption->hijos->count() > 0)
    @foreach($menuOption->hijos as $menuOption)
        @include('autorizacion.partials.menuOption', $menuOption)
    @endforeach
@endif