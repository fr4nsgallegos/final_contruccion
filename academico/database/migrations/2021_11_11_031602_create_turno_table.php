<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('sigla');
            $table->string('orden');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->integer('dia_semana_id')->unsigned();
            $table->integer('sesion_clase_id')->unsigned();
        });
        Schema::table('turno', function($table) {
            $table->foreign('dia_semana_id')->references('id')->on('dia_semana')->onDelete('cascade');
            $table->foreign('sesion_clase_id')->references('id')->on('sesion_clase')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turno');
    }
}
