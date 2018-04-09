<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAlumno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::defaultStringLength(191);

        Schema::create('alumno', function(Blueprint $table) {
            $table->string('matricula');
            $table->integer('id_usuario');
            $table->string('carrera');
            $table->integer('semestre');

            $table->primary('matricula');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('alumno');
    }
}
