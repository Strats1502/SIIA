<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model {
    protected $primaryKey = 'id';

    protected $table = 'semestre';

    protected $fillable = [
        'fecha_u1',
        'fecha_u2',
        'fecha_u3',
        'fecha_final'
    ];

    public $timestamps = false;
}
