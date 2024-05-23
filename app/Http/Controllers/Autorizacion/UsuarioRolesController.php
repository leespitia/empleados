<?php

namespace App\Http\Controllers\Autorizacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;

class UsuarioRolesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $usuario)
    {
        $datos = request()->validate([
            'role' => 'required|exists:roles,id'
        ]);
        
        $role = Role::find($datos['role']);
        
        $usuario->assignRole($role);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario, Role $role)
    {
        request()->validate([
            'role' => 'required|exists:roles,id'
        ]);

        $usuario->removeRole($role);

        return back();
    }
}
