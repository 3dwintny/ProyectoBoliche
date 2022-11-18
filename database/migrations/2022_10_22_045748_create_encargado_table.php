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
        Schema::create('encargado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre1',30);
            $table->string('nombre2',30)->nullable();
            $table->string('nombre3',30)->nullable();
            $table->string('apellido1',30);
            $table->string('apellido2',30)->nullable();
            $table->string('apellido_casada',30)->nullable();
            $table->string('direccion',150);
            $table->string('celular',10)->unique();
            $table->string('telefono_casa',10)->unique();
            $table->string('correo',100)->unique();
            $table->string('dpi',25)->unique();
            $table->unsignedInteger('id_parentezco');
            $table->foreign('id_parentezco')->references('id')->on('parentezco');
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
        Schema::dropIfExists('encargado');
    }
};
