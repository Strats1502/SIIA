<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model {
    protected $primaryKey = 'id';

    protected $table = 'unidad';

    protected $fillable = [
        'numero',
        'faltas',
        'reprobados',
        'desertores',
        'id_alumno_grupo'
    ];

    public $timestamps = false;
}
