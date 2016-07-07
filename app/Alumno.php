<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Alumno extends Model
{
    protected $fillable = ['nombre', 'apellido', 'genero'];
    protected $appends = array('nombreCompleto');

    public function grados() {
    	return $this->belongsToMany('App\Grado','alumno_grados','alumno_id','grado_id');
    }

    public function getGeneroAttribute($genero) {
    	if ($genero == 0) {
    		return 'Hombre';
    	} else {
    		return 'Mujer';
    	}
    }

    public function getNombreCompletoAttribute()
    {
        return Str::title($this->nombre.' '.$this->apellido);
    }
}
