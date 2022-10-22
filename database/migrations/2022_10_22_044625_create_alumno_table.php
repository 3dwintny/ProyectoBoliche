<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre1',30);
            $table->string('nombre2',30);
            $table->string('nombre3',30);
            $table->string('apellido1',30);
            $table->string('apellido2',30);
            $table->string('cui',20)->unique();
            $table->date('fecha');
            $table->unsignedInteger('edad');
            $table->double('peso');
            $table->double('altura');
            $table->double('peso');
            $table->string('genero',25);
            $table->string('direccio',150);
            $table->string('telefono_casa',10)->unique();
            $table->string('celular',10)->unique();
            $table->string('correo',150)->unique();
            $table->string('contacto_emergencia',10);
            $table->string('foto',100);
            $table->date('fecha_fotografia');
            $table->string('estado',20);
            $table->string('nit',20)->unique();
            $table->string('pasaporte',30)->unique();

            $table->unsignedInteger('id_encargado');
            $table->foreign('id_encargado')->references('id')->on('encargado');

            $table->unsignedInteger('id_alergia');
            $table->foreign('id_alergia')->references('id')->on('alergia');

            $table->unsignedInteger('id_departamento');
            $table->foreign('id_departamento')->references('id')->on('departamento');

            $table->unsignedInteger('id_municipio');
            $table->foreign('id_municipio')->references('id')->on('municipio');

            $table->unsignedInteger('id_nacionalidad');
            $table->foreign('id_nacionalidad')->references('id')->on('nacionaliad');

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
        Schema::dropIfExists('alumno');
    }
};
