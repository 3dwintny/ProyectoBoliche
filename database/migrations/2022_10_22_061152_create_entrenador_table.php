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
        Schema::create('entrenador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre1',30);
            $table->string('nombre2',30)->nullable();
            $table->string('nombre3',30)->nullable();
            $table->string('apellido1',30);
            $table->string('apellido2',30);
            $table->string('apellido_casada',30)->nullable();
            $table->string('celular',10)->nullable();
            $table->string('telefono_casa',10)->nullable();
            $table->string('cui',15);
            $table->string('pasaporte',15)->nullable();
            $table->string('genero',25);
            $table->date('fecha_nacimiento');
            $table->unsignedInteger('edad');
            $table->unsignedInteger('años_experiencia')->nullable();
            $table->string('correo',50);
            $table->string('direccion',100);
            $table->string('foto',100);
            $table->string('estado_civil',25);
            $table->string('nit',15)->nullable();
            $table->date('fecha_registro');
            $table->string('escolaridad',20);
            $table->unsignedInteger('id_nivel_cdag');
            $table->foreign('id_nivel_cdag')->references('id')->on('nivel_cdag');
            $table->unsignedInteger('id_nivel_fadn');
            $table->foreign('id_nivel_fadn')->references('id')->on('nivel_fadn');
            $table->unsignedInteger('id_departamento');
            $table->foreign('id_departamento')->references('id')->on('departamento');
            $table->unsignedInteger('id_nacionalidad');
            $table->foreign('id_nacionalidad')->references('id')->on('nacionalidad');
            $table->unsignedInteger('id_deporte');
            $table->foreign('id_deporte')->references('id')->on('deporte');
            $table->unsignedInteger('id_tipo_contrato');
            $table->foreign('id_tipo_contrato')->references('id')->on('tipo_contrato');
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
        Schema::dropIfExists('entrenador');
    }
};
