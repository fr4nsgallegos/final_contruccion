<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallaProfesorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('malla_profesor', function (Blueprint $table) {
            $table->id();
            //$table->integer('malla_academica_id')->unsigned();
            $table->integer('admin_users_id')->unsigned();
            $table->integer('curso_academico_id')->unsigned();
            $table->integer('asignatura_id')->unsigned();
        });
        Schema::table('malla_profesor', function($table) {
            //$table->foreign('malla_academica_id')->references('id')->on('malla_academica')->onDelete('cascade');
            $table->foreign('admin_users_id')->references('id')->on('admin_users')->onDelete('cascade');
            $table->foreign('curso_academico_id')->references('id')->on('curso_academico')->onDelete('cascade');
            $table->foreign('asignatura_id')->references('id')->on('asignatura')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('malla_profesor');
    }
}
