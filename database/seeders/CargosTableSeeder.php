<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cargos')->insert(['descripcion'=>'Jefe de área']); // 1
        DB::table('cargos')->insert(['descripcion'=>'Coordinador']); // 2
        DB::table('cargos')->insert(['descripcion'=>'Analista']); // 3
        DB::table('cargos')->insert(['descripcion'=>'Auxiliar']); // 4
    }
}
