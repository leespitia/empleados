<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'inicio']); // 1
        Permission::create(['name' => 'autorizacion']); // 2
        Permission::create(['name' => 'permisos_listar']); // 3
        Permission::create(['name' => 'roles_listar']); // 4
        Permission::create(['name' => 'usuarios_listar']); // 5
        Permission::create(['name' => 'opciones_menu_listar']); // 6
        // Permission::create(['name' => 'generales']); // 7
        // Permission::create(['name' => 'vigencias_listar']); // 8
        // Permission::create(['name' => 'sedes_listar']); // 9
        // Permission::create(['name' => 'grados_listar']); // 10
        // Permission::create(['name' => 'nivels_listar']); // 11
        // Permission::create(['name' => 'areas_listar']); // 12
        // Permission::create(['name' => 'asignaturas_listar']); // 13
        // Permission::create(['name' => 'carga_academica']); // 14
        // Permission::create(['name' => 'asignacions_listar']); // 15
        // Permission::create(['name' => 'grupos_listar']); // 16
        // Permission::create(['name' => 'distribuciones_listar']); // 17
        
        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'Superadministrador']); // 1
        $role = Role::create(['name' => 'Empleado']); // 2

        // Crear usuario Super Administrador
        DB::table('users')->insert([
            'default_role' => 1,
            'tipo_documento_id' => 1,
            'documento' => 123123123,
            'name1' => 'Luis',
            'lastname1' => 'Espitia',
            'email' => 'leespitia@gmail.com',
            'password' => Hash::make('123123'),
            'created_at' => now()
        ]);

        $user = User::find(1);
        $user->assignRole('Superadministrador');
    }
}
