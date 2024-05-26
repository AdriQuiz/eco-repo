<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateInversionesProyectosTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inversions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inversor_id');
            $table->unsignedBigInteger('proyecto_id');
            $table->integer('monto');

            $table->foreign('inversor_id')->references('id')->on('inversores');
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
            $table->timestamps();
        });

        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->string('titulo');
            $table->string('tipo');
            $table->integer('progreso')->default(0);
            $table->boolean('es_viable')->default(false);

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
