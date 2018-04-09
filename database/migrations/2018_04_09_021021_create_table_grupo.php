<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('grupo', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('id_maestro');
            $table->integer('id_asignatura');
            $table->integer('grupo');
            $table->string('salon');
            $table->integer('id_horario');
            $table->integer('reprobados');
            $table->integer('desertores');
            $table->integer('semestre');
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
