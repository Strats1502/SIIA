<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model {
    protected $table = 'carrera';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_campus',
        'nombres',
        'ruta_imagen',
        'abreviatura',
        'total_creditos',
        'estructura_generica_creditos',
        'residencia_profesional_creditos',
        'servicio_social_creditos',
        'actividades_complementarias_creditos'
    ];

    public $timestamps = false;
}
