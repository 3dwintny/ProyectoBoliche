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
        Schema::create('horario', function (Blueprint $table) {
            $table->increments('id');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('lunes',2)->nullable();
            $table->string('martes',2)->nullable();
            $table->string('miercoles',2)->nullable();
            $table->string('jueves',2)->nullable();
            $table->string('viernes',2)->nullable();
            $table->string('sabado',2)->nullable();
            $table->string('domingo',2)->nullable();
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
        Schema::dropIfExists('horario');
    }
};
