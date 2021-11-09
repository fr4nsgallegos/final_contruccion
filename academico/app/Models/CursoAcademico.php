<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoAcademico extends Model
{
    protected $table = 'Curso_Academico';

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
        return url('/admin/curso-academicos/'.$this->getKey());
    }
}
