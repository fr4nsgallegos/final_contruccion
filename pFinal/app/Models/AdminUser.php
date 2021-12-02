<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminUser extends Model
{
    use SoftDeletes;
    protected $table = 'Admin_Users';

    protected $fillable = [
        'first_name',
        'last_name',
        'usuario',
        'dni',
        'email',
        'password',
        'activated',
        'forbidden',
        'language',
        'last_login_at',
    
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    
    ];
    
    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at',
        'last_login_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/admin-users/'.$this->getKey());
    }

    public function malla_profesor() 
    {
        return $this->hasMany(MallaProfesor::class);
    }
}
