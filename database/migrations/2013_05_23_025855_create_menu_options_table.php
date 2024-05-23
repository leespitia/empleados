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
        Schema::create('menu_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_option_id')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('permission_id');
            $table->string('ruta')->default('#');
            $table->string('icono')->nullable();
            $table->boolean('activo')->default(false);
            $table->integer('level')->default(0);
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->foreign('menu_option_id')->references('id')->on('menu_options');
            $table->foreign('permission_id')->references('id')->on('permissions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_options');
    }
};
