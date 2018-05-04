<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    protected $primaryKey = 'id';

    protected $table = 'usuario';

    protected $fillable = [
        'id_tecnologico',
        'correo',
        'password',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'tipo'
    ];

    public $timestamps = false;
}
