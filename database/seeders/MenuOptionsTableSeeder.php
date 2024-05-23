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
        DB::table('menu_options')->insert(['menu_option_id'=>2,'name'=>'Usuarios', 'permission_id'=>5, 'ruta'=>'usuarios', 'activo'=>true, 'level'=>1]); // 5
        DB::table('menu_options')->insert(['menu_option_id'=>2,'name'=>'Opciones de menú', 'permission_id'=>6, 'ruta'=>'menu_options', 'activo'=>true, 'level'=>1]); // 6
        // DB::table('menu_options')->insert(['name'=>'Generales', 'permission_id'=>7, 'ruta'=>'#', 'icono'=>'fas fa-key', 'activo'=>true, 'level'=>0]); // 7
        // DB::table('menu_options')->insert(['menu_option_id'=>7,'name'=>'Vigencias', 'permission_id'=>8, 'ruta'=>'vigencias', 'activo'=>true, 'level'=>1]); // 8
        // DB::table('menu_options')->insert(['menu_option_id'=>7,'name'=>'Sedes', 'permission_id'=>9, 'ruta'=>'sedes', 'activo'=>true, 'level'=>1]); // 9
        // DB::table('menu_options')->insert(['menu_option_id'=>7,'name'=>'Grados', 'permission_id'=>10, 'ruta'=>'grados', 'activo'=>true, 'level'=>1]); // 10
        // DB::table('menu_options')->insert(['menu_option_id'=>7,'name'=>'Niveles académicos', 'permission_id'=>11, 'ruta'=>'nivels', 'activo'=>true, 'level'=>1]); // 11
        // DB::table('menu_options')->insert(['menu_option_id'=>7,'name'=>'Áreas', 'permission_id'=>12, 'ruta'=>'areas', 'activo'=>true, 'level'=>1]); // 12
        // DB::table('menu_options')->insert(['menu_option_id'=>7,'name'=>'Asignaturas', 'permission_id'=>13, 'ruta'=>'asignaturas', 'activo'=>true, 'level'=>1]); // 13
        // DB::table('menu_options')->insert(['name'=>'Carga académica', 'permission_id'=>14, 'ruta'=>'#', 'icono'=>'fas fa-key', 'activo'=>true, 'level'=>0]); // 14
        // DB::table('menu_options')->insert(['menu_option_id'=>14,'name'=>'Asignación', 'permission_id'=>15, 'ruta'=>'asignacions', 'activo'=>true, 'level'=>1]); // 15
        // DB::table('menu_options')->insert(['menu_option_id'=>14,'name'=>'Grupos', 'permission_id'=>16, 'ruta'=>'grupos', 'activo'=>true, 'level'=>1]); // 16
        // DB::table('menu_options')->insert(['menu_option_id'=>14,'name'=>'Distribuciones', 'permission_id'=>17, 'ruta'=>'distribucions', 'activo'=>true, 'level'=>1]); // 17
    }
}
