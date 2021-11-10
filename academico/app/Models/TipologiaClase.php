<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipologiaClase extends Model
{
    protected $table = 'Tipologia_Clase';

    protected $fillable = [
        'nombre',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tipologia-clases/'.$this->getKey());
    }
}
