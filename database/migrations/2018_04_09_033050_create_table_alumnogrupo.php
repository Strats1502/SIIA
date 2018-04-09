<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlumnogrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('alumno_grupo', function(Blueprint $table) {
            $table->increments('id');
            $table->string('matricula_alumno');
            $table->integer('id_grupo');
            $table->string('tipo_curso');
            $table->integer('unidades');
            $table->integer('faltas_totales');
            $table->double('calificacion_total', 8, 2);            
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
