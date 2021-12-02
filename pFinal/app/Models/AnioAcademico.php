<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnioAcademico extends Model
{
    protected $table = 'Anio_Academico';

    protected $fillable = [
        'nombre_anio_academico',
        'sigla',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/anio-academicos/'.$this->getKey());
    }

    public function malla_curso() 
    {
        return $this->hasMany(MallaCurso::class);
    }
}
