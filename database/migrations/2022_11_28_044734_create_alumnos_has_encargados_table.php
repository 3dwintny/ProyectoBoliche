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
        Schema::create('alumnos_has_encargados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_encargado');
            $table->foreign('id_encargado')->references('id')->on('encargado');

            $table->unsignedInteger('id_alumno');
            $table->foreign('id_alumno')->references('id')->on('alumno');

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
        Schema::dropIfExists('alumnos_has_encargados');
    }
};
