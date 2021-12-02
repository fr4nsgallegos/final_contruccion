<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MallaCurso extends Model
{
    protected $table = 'Malla_Curso';

    protected $fillable = [
        'cantidad_horas_tipologia',
        'cantidad_credito',
        'malla_academica_id',
        'asignatura_id',
        'tipologia_clase_id',
        'semestre_academico_id',
        'anio_academico_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/malla-cursos/'.$this->getKey());
    }

    public function malla_academica() 
    {
        return $this->belongsTo(MallaAcademica::class);
    }

    public function asignatura() 
    {
        return $this->belongsTo(Asignatura::class);
    }

    public function tipologia_clase() 
    {
        return $this->belongsTo(TipologiaClase::class);
    }

    public function semestre_academico() 
    {
        return $this->belongsTo(SemestreAcademico::class);
    }

    public function anio_academico() 
    {
        return $this->belongsTo(AnioAcademico::class);
    }

    public function malla_profesor() 
    {
        return $this->hasMany(MallaProfesor::class);
    }
}
