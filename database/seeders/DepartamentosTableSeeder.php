<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departamentos')->insert(['descripcion'=>'Sistemas']); // 1
        DB::table('departamentos')->insert(['descripcion'=>'Contabilidad']); // 2
        DB::table('departamentos')->insert(['descripcion'=>'Financiera']); // 3
        DB::table('departamentos')->insert(['descripcion'=>'Administración']); // 4
        DB::table('departamentos')->insert(['descripcion'=>'Comercial']); // 5
    }
}
