<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model {
    protected $primaryKey = 'id';

    protected $table = 'horario';

    protected $fillable = [
        'semestre',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes'
    ];

    public $timestamps = false;
}
