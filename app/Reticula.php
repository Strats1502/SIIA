<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reticula extends Model {
    protected $table = 'reticula';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_carrera',
        'numero',
        'numero_semestres'
    ];

    public $timestamps = false;
}
