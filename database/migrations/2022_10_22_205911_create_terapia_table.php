<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terapia', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('numero_terapia');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->text('impresion_clinica');
            $table->text('analisis_semiologico');
            $table->text('desarrollo');
            $table->text('observaciones');
            $table->text('tarea');
            $table->unsignedInteger('conciencia_corporal');
            $table->unsignedInteger('dominio_corporal');
            $table->unsignedInteger('dominio_respiracion');
            $table->unsignedInteger('dialogo_interno');
            $table->unsignedInteger('atencion');
            $table->unsignedInteger('concentracion');
            $table->unsignedInteger('motivacion');
            $table->unsignedInteger('confianza');
            $table->unsignedInteger('activacion');
            $table->unsignedInteger('relajacion');
            $table->unsignedInteger('estres');
            $table->unsignedInteger('ansiedad_cognitiva');
            $table->unsignedInteger('ansiedad_fisica');
            $table->unsignedInteger('miedo');
            $table->unsignedInteger('frustracion');
            $table->unsignedInteger('id_psicologia');
            $table->foreign('id_psicologia')->references('id')->on('psicologia');
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
        Schema::dropIfExists('terapia');
    }
};
