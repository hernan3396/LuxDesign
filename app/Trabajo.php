<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'work_type_id', 'imagen', 'carrusel'];

    public function workType()
    {
        return $this->belongsTo('App\WorkType');
    }
}
