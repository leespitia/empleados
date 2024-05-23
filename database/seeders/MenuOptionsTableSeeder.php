<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu_options')->insert(['name'=>'Inicio', 'permission_id'=>1, 'ruta'=>'home', 'icono'=>'fas fa-house-user', 'activo'=>true, 'level'=>0]); // 1
        DB::table('menu_options')->insert(['name'=>'Autorizacion', 'permission_id'=>2, 'ruta'=>'#', 'icono'=>'fas fa-key', 'activo'=>true, 'level'=>0]); // 2
        DB::table('menu_options')->insert(['menu_option_id'=>2, 'name'=>'Permisos', 'permission_id'=>3, 'ruta'=>'permisos', 'activo'=>true, 'level'=>1]); // 3
        DB::table('menu_options')->insert(['menu_option_id'=>2,'name'=>'Roles', 'permission_id'=>4, 'ruta'=>'roles', 'activo'=>true, 'level'=>1]); // 4
        DB::table('menu_options')->insert(['menu_option_id'=>2,'name'=>'Empleados', 'permission_id'=>5, 'ruta'=>'usuarios', 'activo'=>true, 'level'=>1]); // 5
        DB::table('menu_options')->insert(['menu_option_id'=>2,'name'=>'Opciones de menú', 'permission_id'=>6, 'ruta'=>'menu_options', 'activo'=>true, 'level'=>1]); // 6
        DB::table('menu_options')->insert(['menu_option_id'=>2,'name'=>'Departamentos', 'permission_id'=>6, 'ruta'=>'departamentos', 'activo'=>true, 'level'=>1]); // 7
         
    }
}
