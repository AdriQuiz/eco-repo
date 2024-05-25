<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixFieldsInversionProyecto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('inversions', 'inversiones');

        Schema::table('inversiones', function(Blueprint $table) {
            $table->unsignedBigInteger('inversor_id');
            $table->unsignedBigInteger('proyecto_id');
            $table->integer('monto');

            $table->foreign('inversor_id')->references('id')->on('inversores');
            $table->foreign('proyecto_id')->references('id')->on('proyectos');
        });

        Schema::table('proyectos', function(Blueprint $table) {
            $table->unsignedBigInteger('empresa_id');
            $table->string('titulo');
            $table->string('tipo');
            $table->integer('costo');
            $table->integer('plazo_ejecucion');
            $table->boolean('es_viable')->default(false);

            $table->foreign('empresa_id')->references('id')->on('empresas');
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
