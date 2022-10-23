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
        Schema::table('terapia', function (Blueprint $table) {
            $table->unsignedInteger('conciencia_corporal');
            $table->unsignedInteger('dominio_corporal');
            $table->unsignedInteger('dominio_respiracion');
            $table->unsignedInteger('dialogo_interno');
            $table->unsignedInteger('atencion');
            $table->unsignedInteger('concentracion');
            $table->unsignedInteger('motivacion');
            $table->unsignedInteger('confianza');
            $table->unsignedInteger('activacion');
            $table->unsignedInteger('relajacion');
            $table->unsignedInteger('estres');
            $table->unsignedInteger('ansiedad_cognitiva');
            $table->unsignedInteger('ansiedad_fisica');
            $table->unsignedInteger('miedo');
            $table->unsignedInteger('frustracion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('terapia', function (Blueprint $table) {
            //
        });
    }
};
