<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model {
    protected $primaryKey = 'id';

    protected $table = 'asignatura';

    protected $fillable = [
        'nombre',
        'creditos',
        'unidades'
    ];

    public $timestamps = false;
}
