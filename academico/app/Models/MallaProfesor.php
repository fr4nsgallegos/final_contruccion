<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MallaProfesor extends Model
{
    protected $table = 'Malla_Profesor';

    protected $fillable = [
        'asignatura_id',
        'admin_users_id',
        'curso_academico_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/malla-profesors/'.$this->getKey());
    }
}
