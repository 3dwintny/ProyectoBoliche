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
        Schema::table('alumno', function (Blueprint $table) {
            $table->unsignedInteger('id_departamento_residencia');
            $table->foreign('id_departamento_residencia')->references('id')->on('departamento');

            $table->unsignedInteger('id_municipio_residencia');
            $table->foreign('id_municipio_residencia')->references('id')->on('municipio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumno', function (Blueprint $table) {
            //
        });
    }
};
