<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $table = 'Profesor';

    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'usuario',
        'email',
        'password',
    
    ];
    
    protected $hidden = [
        'password',
    
    ];
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/profesors/'.$this->getKey());
    }
}
