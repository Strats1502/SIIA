<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model {
    protected $primaryKey = 'id';

    protected $table = 'grupo';

    protected $fillable = [
        'id_maestro',
        'id_asignatura',
        'grupo',
        'salon',
        'id_horario',
        'reprobados',
        'desertores',
        'semestre'
    ];

    public $timestamps = false;
}
