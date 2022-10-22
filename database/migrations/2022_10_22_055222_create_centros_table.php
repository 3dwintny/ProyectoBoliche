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
        Schema::create('centro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30)->unique();
            $table->string('direccion',150);
            $table->date('fecha_registro');
            $table->string('institucion',30)->nullable();
            $table->string('accesibilidad',30)->nullable();
            $table->string('implementacion',30)->nullable();
            $table->string('espacio_fisico',30)->nullable();
            $table->unsignedInteger('id_horario');
            $table->foreign('id_horario')->references('id')->on('horario');
            $table->unsignedInteger('id_departamento');
            $table->foreign('id_departamento')->references('id')->on('departamento');
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
        Schema::dropIfExists('centro');
    }
};
