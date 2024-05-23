<?php

namespace App\Http\Controllers\Autorizacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermisosController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Role $role)
    {
        $datos = request()->validate([
            'permiso' => 'required|exists:permissions,id'
        ]);
        
        $permiso = Permission::find($datos['permiso']);
        
        $role->givePermissionTo($permiso);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role, Permission $permiso)
    {
        
        request()->validate([
            'permiso' => 'required|exists:permissions,id'
        ]);

        $role->revokePermissionTo($permiso);

        return back();

    }
}
