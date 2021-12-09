<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'Evento';

    protected $fillable = [
        'title',
        'descripcion',
        'start',
        'end',
        'malla_profesor_id',
        'local_id',
    
    ];
    
    
    protected $dates = [
        'start',
        'end',
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/eventos/'.$this->getKey());
    }
}
