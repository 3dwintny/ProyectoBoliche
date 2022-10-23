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
            $table->unsignedInteger('id_conciencia_corporal');
            $table->unsignedInteger('id_dominio_corporal');
            $table->unsignedInteger('id_dominio_respiracion');
            $table->unsignedInteger('id_dialogo_interno');
            $table->unsignedInteger('id_atencion');
            $table->unsignedInteger('id_concentracion');
            $table->unsignedInteger('id_motivacion');
            $table->unsignedInteger('id_confianza');
            $table->unsignedInteger('id_activacion');
            $table->unsignedInteger('id_relajacion');
            $table->unsignedInteger('id_estres');
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
