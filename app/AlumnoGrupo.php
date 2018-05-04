<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlumnoGrupo extends Model {
    protected $primaryKey = 'id';

    protected $table = 'alumno_grupo';

    protected $fillable = [
        'matricula_alumno',
        'id_grupo',
        'tipo_curso',
        'unidades',
        'faltas_totales',
        'calificacion_total'
    ];

    public $timestamps = false;
}
