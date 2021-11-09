<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallaAcademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malla_academica', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->date('anio_creacion');
            $table->integer('cantidad_anios');
            $table->integer('cantidad_semestre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('malla_academica');
    }
}
