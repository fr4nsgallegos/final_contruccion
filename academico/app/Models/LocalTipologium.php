<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocalTipologium extends Model
{
    protected $table = 'Local_Tipologia';

    protected $fillable = [
        'local_id',
        'tipologia_clase_id',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/local-tipologia/'.$this->getKey());
    }
}
