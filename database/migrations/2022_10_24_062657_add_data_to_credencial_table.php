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
        Schema::table('credencial', function (Blueprint $table) {
            $table->unsignedInteger('id_atleta')->after('id_tipo_usuario');
            $table->foreign('id_atleta')->references('id')->on('atleta');

            $table->unsignedInteger('id_entrenador')->after('id_atleta');
            $table->foreign('id_entrenador')->references('id')->on('entrenador');

            $table->unsignedInteger('id_psicologia')->after('id_entrenador');
            $table->foreign('id_psicologia')->references('id')->on('psicologia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('credencial', function (Blueprint $table) {
            //
        });
    }
};
