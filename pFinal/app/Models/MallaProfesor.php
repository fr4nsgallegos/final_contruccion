<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MallaProfesor extends Model
{
    protected $table = 'Malla_Profesor';

    protected $fillable = [
        'admin_users_id',
        'curso_academico_id',
        'malla_curso_id',
    
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

    public function admin_users() 
    {
        return $this->belongsTo(AdminUser::class);
    }

    public function curso_academico() 
    {
        return $this->belongsTo(CursoAcademico::class);
    }

    public function malla_curso() 
    {
        return $this->belongsTo(MallaCurso::class);
    }

    public function asignatura() 
    {
        return $this->belongsTo(Asignatura::class);
    }
}
