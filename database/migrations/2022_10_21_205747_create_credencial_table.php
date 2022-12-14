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
        Schema::create('credencial', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario',30)->unique();
            $table->string('password',30)->unique();
            $table->unsignedInteger('id_tipo_usuario');
            $table->foreign('id_tipo_usuario')->references('id')->on('tipo_usuario');
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
        Schema::dropIfExists('credencial');
    }
};
