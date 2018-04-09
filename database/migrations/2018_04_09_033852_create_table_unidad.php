<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUnidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('unidad', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->integer('faltas');
            $table->integer('reprobados');
            $table->integer('desertores');
            $table->integer('id_alumno_grupo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
