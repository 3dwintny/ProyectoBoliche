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
        Schema::create('atleta', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_ingreso');
            $table->string('adaptado',10);
            $table->string('estado_civil',30);
            $table->string('etnia',20);
            $table->string('escolaridad');

            $table->unsignedInteger('id_centro');
            $table->foreign('id_centre')->references('id')->on('centro');

            $table->unsignedInteger('id_entrenador');
            $table->foreign('id_entrenador')->references('id')->on('entrenador');

            $table->unsignedInteger('id_alumno');
            $table->foreign('id_alumno')->references('id')->on('alumno');

            $table->unsignedInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categoria');

            $table->unsignedInteger('id_etapa_deportiva');
            $table->foreign('id_etapa_deportiva')->references('id')->on('etapa_deportiva');

            $table->unsignedInteger('id_deporte_adaptado')->nullable();
            $table->foreign('id_deporte_adaptado')->references('id')->on('deporte_adaptado');

            $table->unsignedInteger('id_asistencia');
            $table->foreign('id_asistencia')->references('id')->on('asistencia');

            $table->unsignedInteger('id_otro_programa')->nullable();
            $table->foreign('id_otro_programa')->references('id')->on('otro_programa');

            $table->unsignedInteger('id_liea_desarrollo');
            $table->foreign('id_line_desarrollo')->references('id')->on('linea_desarrollo');

            $table->unsignedInteger('id_etapa_deportiva')->nullable();
            $table->foreign('id_etapa_deportiva')->references('id')->on('etapa_deportiva');

            $table->unsignedInteger('id_deporte');
            $table->foreign('id_deporte')->references('id')->on('deporte');

            $table->unsignedInteger('id_modalidad');
            $table->foreign('id_modalidad')->references('id')->on('modalidad');

            $table->unsignedInteger('id_prt');
            $table->foreign('id_prt')->references('id')->on('prt');

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
        Schema::dropIfExists('atleta');
    }
};
