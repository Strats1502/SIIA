<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codigo extends Model {
    protected $primaryKey = 'id';

    protected $table = 'codigo';

    protected $fillable = [
        'id_maestro',
        'fecha_inicial',
        'fecha_final'
    ];

    public $timestamps = false;
}
