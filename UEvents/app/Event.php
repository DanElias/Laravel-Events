<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $primaryKey = 'idEvento';
    protected $fillable = ['nombre', 'siglas', 'duracion', 'limiteAsistentes', 'costo', 'lugar', 'descripcion', 'fecha'];
}
