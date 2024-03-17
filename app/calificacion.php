<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class calificacion extends Model
{
    protected $fillable = [
        'actividad', 'tipo', 'calificacion', 'materiaId'
    ];
}
