<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkType extends Model
{
    protected $fillable = ['workType', 'imagen'];

    public function trabajos()
    {
        return $this->hasMany('App\Trabajo');
    }
}
