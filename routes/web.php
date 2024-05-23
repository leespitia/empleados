<?php

use App\Http\Controllers\Autorizacion\MenuOptionController;
use App\Http\Controllers\Autorizacion\PermisosController;
use App\Http\Controllers\Autorizacion\RolePermisosController;
use App\Http\Controllers\Autorizacion\RolesController;
use App\Http\Controllers\Autorizacion\UsuarioRolesController;
use App\Http\Controllers\Autorizacion\UsuariosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

// Auth::routes();

Auth::routes([
    'login'    => true,
    'logout'   => true,
    'register' => false,
    'reset'    => true,  // for resetting passwords
    'confirm'  => false,  // for additional password confirmations
    'verify'   => false,  // for email verification
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'permisos'])->group(function () {
    
    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');
        
    // Usuarios, permisos, roles
    Route::resource('usuarios', UsuariosController::class);
        
    Route::get('/profile', [UsuariosController::class, 'profile']);
    Route::patch('/profile/{usuario}', [UsuariosController::class, 'profileUpdate']);
    Route::resource('permisos', PermisosController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('menu_options', MenuOptionController::class);
    
    Route::post('/roles/{role}/permisos', [RolePermisosController::class, 'store']); // Agregar un Permiso a un Rol
    Route::delete('/roles/{role}/permisos/{permiso}', [RolePermisosController::class, 'destroy']); // Quitar Permiso de un Rol

    Route::post('/usuarios/{usuario}/roles', [UsuarioRolesController::class, 'store']); // Agregar un Rol a un Usuario
    Route::delete('/usuarios/{usuario}/roles/{role}', [UsuarioRolesController::class, 'destroy']); // Quitar un Rol de un Usuario

    /////////////////////

    // Route::post('/roles/{role}/permisos', [RolesPermisosController::class, 'store']); // Agregar un Permiso a un Rol
    // Route::delete('/roles/{role}/permisos/{permiso}', [RolesPermisosController::class, 'destroy']); // Eliminar un Permiso de un Rol
    // Route::post('/usuarios/{usuario}/roles', [UsuariosRolesController::class, 'store']); // Agregar un Rol a un Usuario
    // Route::resource('usuarios', UserController::class);
    // Route::resource('roles', RolesController::class);
    // Route::resource('permisos', PermisosController::class);

});
