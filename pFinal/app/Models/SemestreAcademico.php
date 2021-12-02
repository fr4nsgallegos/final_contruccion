<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SemestreAcademico extends Model
{
    protected $table = 'Semestre_Academico';

    protected $fillable = [
        'nombre_semestre',
        'orden',
        'sesion_clase_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/semestre-academicos/'.$this->getKey());
    }

    public function sesion_clase()
    {
        return $this->belongsTo(SesionClase::class);
    }

    public function malla_curso() 
    {
        return $this->hasMany(MallaCurso::class);
    }
}
