<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetricasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metricas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proyecto_id');
            $table->integer('costo_total');
            $table->integer('beneficios_netos');
            $table->boolean('crea_empleos');
            $table->boolean('acceso_servicios');
            $table->integer('emision_gases');
            $table->integer('consumo_recursos');
            $table->boolean('tecno_disponible');
            $table->boolean('gestion_riesgos');
            $table->timestamps();
        });

        Schema::rename('inversions', 'inversiones');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metricas');
    }
}
