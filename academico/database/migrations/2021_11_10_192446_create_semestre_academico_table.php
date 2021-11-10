<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestreAcademicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semestre_academico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('orden');
            $table->integer('sesion_clase_id')->unsigned();
        });
        Schema::table('semestre_academico', function($table) {
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
        Schema::dropIfExists('semestre_academico');
    }
}
