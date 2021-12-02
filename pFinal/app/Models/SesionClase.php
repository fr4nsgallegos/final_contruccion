<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SesionClase extends Model
{
    protected $table = 'Sesion_Clase';

    protected $fillable = [
        'nombre_sesion_clase',
        'sigla',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/sesion-clases/'.$this->getKey());
    }

    public function semestre_academico() 
    {
        return $this->hasMany(SemestreAcademico::class);
    }

    public function turno() 
    {
        return $this->hasMany(Turno::class);
    }
}
