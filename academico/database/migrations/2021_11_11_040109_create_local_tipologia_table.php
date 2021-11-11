<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalTipologiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_tipologia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('local_id')->unsigned();
            $table->integer('tipologia_clase_id')->unsigned();
        });
        Schema::table('local_tipologia', function($table) {
            $table->foreign('local_id')->references('id')->on('local')->onDelete('cascade');
            $table->foreign('tipologia_clase_id')->references('id')->on('tipologia_clase')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local_tipologia');
    }
}
