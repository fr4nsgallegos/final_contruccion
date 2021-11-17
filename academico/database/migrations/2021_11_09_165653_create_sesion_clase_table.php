<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesionClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesion_clase', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->unique();
            $table->string('sigla');
            //$table->string('turno');
            $table->integer('local_id')->unsigned();
        });

        Schema::table('sesion_clase', function($table) {
            $table->foreign('local_id')->references('id')->on('local')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sesion_clase');
    }
}
