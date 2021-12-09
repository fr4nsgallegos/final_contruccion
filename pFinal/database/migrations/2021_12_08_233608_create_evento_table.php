<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('descripcion');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->integer('malla_profesor_id')->unsigned();
            $table->integer('local_id')->unsigned();
        });

        Schema::table('evento', function($table) {
            $table->foreign('malla_profesor_id')->references('id')->on('malla_profesor')->onDelete('cascade');
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
        Schema::dropIfExists('evento');
    }
}
