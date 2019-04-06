<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany|string
     */
    public  function role()
    {
        return $this->belongsTo("App\Role","role_id");
    }

    public function photo()
    {
        return $this->belongsTo("App\photo");
    }


    public function isAdmin()
    {

        if(strtolower($this->role->name)=="administrator" && $this->is_active==1)
        {
            return true;
        }
        return false;
    }
}
