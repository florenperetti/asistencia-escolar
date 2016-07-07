<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $fillable = ['nombre', 'ciclo_id'];

    public function alumnos() {
    	return $this->belongsToMany('App\Alumno','alumno_grados');
    }
}
