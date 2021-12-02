<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'Asignatura';

    protected $fillable = [
        'nombre_asignatura',
        'sigla',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/asignaturas/'.$this->getKey());
    }

    public function malla_curso() 
    {
        return $this->hasMany(MallaCurso::class);
    }
}
