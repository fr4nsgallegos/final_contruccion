<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MallaAcademica extends Model
{
    protected $table = 'Malla_Academica';

    protected $fillable = [
        'nombre',
        'anio_creacion',
        'cantidad_anios',
        'cantidad_semestre',
    
    ];
    
    
    protected $dates = [
        'anio_creacion',
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/malla-academicas/'.$this->getKey());
    }
}
