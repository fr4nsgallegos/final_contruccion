<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipologiaClase extends Model
{
    protected $table = 'Tipologia_Clase';

    protected $fillable = [
        'nombre_tipologia',
    
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

    public function malla_curso() 
    {
        return $this->hasMany(MallaCurso::class);
    }
}
