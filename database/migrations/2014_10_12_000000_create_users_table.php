<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();

            $table->id();
            $table->unsignedBigInteger('default_role');
            $table->unsignedBigInteger('tipo_documento_id');
            $table->string('documento')->unique();
            $table->unsignedBigInteger('documento_ubicacion_id')->default(957); // Default: IBAGUE
            $table->unsignedBigInteger('cargo_id')->nullable();
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->string('name1'); 
            $table->string('name2')->nullable(); 
            $table->string('lastname1');
            $table->string('lastname2')->nullable();
            $table->string('email')->unique();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->unsignedBigInteger('direccion_ubicacion_id')->default(957); // Default: IBAGUE
            $table->boolean('activo')->default(true);
            $table->date('fecha_nacimiento')->nullable();
            $table->string('genero', 1)->default('P');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('default_role')->references('id')->on('roles');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
            $table->foreign('documento_ubicacion_id')->references('id')->on('ubicacions');
            $table->foreign('direccion_ubicacion_id')->references('id')->on('ubicacions');
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
