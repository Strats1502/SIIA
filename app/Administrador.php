<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model {
    protected $primaryKey = 'id';

    protected $table = 'administrador';

    protected $fillable = [
        'id_usuario'
    ];

    public $timestamps = false;
}
