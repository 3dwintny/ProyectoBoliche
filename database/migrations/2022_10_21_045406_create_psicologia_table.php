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
        Schema::create('psicologia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre1',30);
            $table->string('nombre2',30)->nullable();
            $table->string('nombre3',30)->nullable();
            $table->string('apellido1',30);
            $table->string('apellido2',30);
            $table->string('apellido_casada',30)->nullable();
            $table->string('colegiado',20);
            $table->string('telefono',10);
            $table->string('correo',50);
            $table->string('direccion',100);
            $table->date('fecha_inicio_labores');
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
        Schema::dropIfExists('psicologia');
    }
};
