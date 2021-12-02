<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallaCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malla_curso', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad_horas_tipologia');
            $table->double('cantidad_credito');
            $table->integer('malla_academica_id')->unsigned();
            $table->integer('asignatura_id')->unsigned();
            $table->integer('tipologia_clase_id')->unsigned();
            $table->integer('semestre_academico_id')->unsigned();
            $table->integer('anio_academico_id')->unsigned();
        });

        Schema::table('malla_curso', function($table) {
            $table->foreign('malla_academica_id')->references('id')->on('malla_academica')->onDelete('cascade');
            $table->foreign('asignatura_id')->references('id')->on('asignatura')->onDelete('cascade');
            $table->foreign('tipologia_clase_id')->references('id')->on('tipologia_clase')->onDelete('cascade');
            $table->foreign('semestre_academico_id')->references('id')->on('semestre_academico')->onDelete('cascade');
            $table->foreign('anio_academico_id')->references('id')->on('anio_academico')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('malla_curso');
    }
}
