<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_documentos')->insert(['descripcion'=>'Cédula de ciudadanía', 'abreviatura'=>'CC']); // 1
        DB::table('tipo_documentos')->insert(['descripcion'=>'Cédula de extranjería', 'abreviatura'=>'CE']); // 2
        DB::table('tipo_documentos')->insert(['descripcion'=>'Pasaporte', 'abreviatura'=>'PAP']); // 3
    }
}
