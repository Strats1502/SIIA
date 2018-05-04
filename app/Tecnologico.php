<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tecnologico extends Model {
    protected $primaryKey = 'id';

    protected $table = 'tecnologico';

    protected $fillable = [
        'nombre',
        'ruta_logo',
        'direccion'
    ];

    public $timestamps = false;
}
