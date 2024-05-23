<?php

namespace App\Http\Controllers\Autorizacion;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\Departamento;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Models\TipoDocumento;
use App\Models\Ubicacion;
use App\Models\User;
use App\Models\Vigencia;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $usuarios = User::all();
        return view('autorizacion.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoDocumentos = TipoDocumento::all();
        $roles = Role::all();
        $municipios = Ubicacion::all();
        $departamentos = Departamento::orderBy('descripcion')->get();
        $cargos = Cargo::all();
        return view('autorizacion.usuarios.create', compact(['tipoDocumentos', 'roles', 'municipios', 'departamentos', 'cargos']));
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
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'documento' => 'required',
            'documento_ubicacion_id' => 'required|exists:ubicacions,id',
            'name1' => 'required|max:255',
            'name2' => 'nullable|max:255',
            'lastname1' => 'required|max:255',
            'lastname2' => 'nullable|max:255',
            'default_role' => 'required|exists:roles,id',
            'fecha_nacimiento' => 'nullable|date',
            'genero' => 'nullable',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'nullable|min:5',
            'direccion_ubicacion_id' => 'nullable|exists:ubicacions,id',
            'password' => 'required|min:6|confirmed',
            'departamento_id' => 'required|exists:departamentos,id',
            'cargo_id' => 'required|exists:cargos,id',

        ]);

        $datos['password'] = Hash::make($datos['password']);

        User::create($datos);

        $usuario = User::all()->last();

        $role = Role::find($datos['default_role']);

        $usuario->assignRole($role);

        if($usuario->rol->name == "Estudiante"){
            
            Estudiante::create(['user_id' => $usuario->id]);

        }

        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return view('autorizacion.usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        $roles = $usuario->roles->pluck('name');
        $roles = Role::whereNotIn('name', $roles)->get();
        $tipoDocumentos = TipoDocumento::all();
        $municipios = Ubicacion::all();
        return view('autorizacion.usuarios.edit', compact(['usuario', 'roles', 'tipoDocumentos', 'municipios']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $datos = $request->validate([
            'tipo_documento_id' => 'nullable|exists:tipo_documentos,id',
            'documento' => 'nullable',
            'documento_ubicacion_id' => 'nullable|exists:ubicacions,id',
            'name1' => 'required|max:255',
            'name2' => 'nullable|max:255',
            'lastname1' => 'required|max:255',
            'lastname2' => 'nullable|max:255',
            'default_role' => 'required|exists:roles,id',
            'fecha_nacimiento' => 'nullable|date',
            'email' => 'required|email',
            'telefono' => 'nullable',
            'direccion' => 'nullable|min:5',
            'direccion_ubicacion_id' => 'required|exists:ubicacions,id',
            'genero' => 'required',
        ]);

        if($request->password){

            $request->validate([
                'password' => 'min:6|confirmed',
            ]);

            $datos['password'] = Hash::make($request->password);

        }

        $usuario->update($datos);

        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort(403);
    }

    public function profile(){

        $usuario = auth()->user();

        return view('autorizacion.usuarios.profile', compact(['usuario']));

    }

    public function profileUpdate(Request $request, User $usuario){

        if($request->password){

            $request->validate([
                'password' => 'min:6|confirmed',
            ]);

            $datos['password'] = Hash::make($request->password);

            $usuario->update($datos);

        }

        return redirect('/home');

    }
}
