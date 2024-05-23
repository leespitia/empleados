<?php

namespace App\Http\Controllers\Autorizacion;

use App\Http\Controllers\Controller;
use App\Models\MenuOption;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Permission;

class MenuOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $menuOptions = MenuOption::whereNull('menu_option_id')->get();
        return view('autorizacion.menu_options.index', compact('menuOptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permisos = Permission::all();
        $menuOptions = MenuOption::all();
        return view('autorizacion.menu_options.create', compact(['permisos', 'menuOptions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'name' => 'required',
            'menu_option_id' => 'nullable|exists:menu_options,id',
            'permission_id' => 'required|exists:permissions,id',
            'ruta' => 'required',
            'icono' => 'nullable',
        ]);

        $datos['level'] = ( $datos['menu_option_id'] ) ? MenuOption::find($datos['menu_option_id'])->level + 1 : 0;

        MenuOption::create($datos);

        return redirect('/menu_options');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MenuOption  $menuOption
     * @return \Illuminate\Http\Response
     */
    public function show(MenuOption $menuOption)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MenuOption  $menuOption
     * @return \Illuminate\Http\Response
     */
    public function edit(MenuOption $menuOption)
    {
        $menuOptions = MenuOption::all();
        $permisos = Permission::all();
        return view('autorizacion.menu_options.edit', compact(['menuOption', 'menuOptions', 'permisos']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuOption  $menuOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuOption $menuOption)
    {
        $datos = $request->validate([
            'name' => 'required',
            'menu_option_id' => 'nullable|exists:menu_options,id',
            'permission_id' => 'required|exists:permissions,id',
            'ruta' => 'required',
            'icono' => 'nullable',
            'activo' => 'nullable',
        ]);

        if(array_key_exists('activo', $datos)){
            $datos['activo'] = true;
        }else{
            $datos['activo'] = false;
        }
        
        $datos['level'] = ( $datos['menu_option_id'] ) ? MenuOption::find($datos['menu_option_id'])->level + 1 : 0;

        $menuOption->update($datos);

        return redirect('/menu_options');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuOption  $menuOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuOption $menuOption)
    {
        abort(403);
    }
}
