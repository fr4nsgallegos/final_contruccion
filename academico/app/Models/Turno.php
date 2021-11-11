<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'Turno';

    protected $fillable = [
        'nombre',
        'sigla',
        'orden',
        'hora_inicio',
        'hora_fin',
        'dia_semana_id',
        'sesion_clase_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/turnos/'.$this->getKey());
    }
}
