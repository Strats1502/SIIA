<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maestro extends Model {
    protected $primaryKey = 'id';

    protected $table = 'maestro';

    protected $fillable = [
        'id_usuario'
    ];

    public $timestamps = false;
}
