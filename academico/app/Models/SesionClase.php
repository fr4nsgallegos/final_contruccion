<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SesionClase extends Model
{
    protected $table = 'Sesion_Clase';

    protected $fillable = [
        'nombre',
        'sigla',
        'local_id',
    
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
}
