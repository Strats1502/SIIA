<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model {
    protected $table = 'alumno';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_usuario',
        'carrera',
        'semestre'
    ];

    public $timestamps = false;

    public $incrementing = false;
}
