<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Models\MenuOption;

class Permisos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(auth()->user()->isAdmin()){ // Todos los permisos para Superadministrador
            return $next($request);
        }

        $path = $request->path();
        $patron = "/[0-9]{1,9}/";
        $sustitución = '*';

        // dd($request->method());
        // dd($path);
        $path = preg_replace($patron, $sustitución, $path); // Reemplaza los ID en la ruta por * para realizar la busqueda

        $menuOption = MenuOption::where('ruta', $path)->get();

        if(!empty($menuOption->first())){
            abort_unless(auth()->user()->rol->hasPermissionTo($menuOption->first()->permission->name), 403); // Error si no tiene permiso
        }else{
            abort(404); // Error si no encuentra la ruta
        }

        return $next($request);
    }
}
