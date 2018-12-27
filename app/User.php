<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rights()
    {
        return $this->belongsToMany('App\Right','users__rights','user_id','right_id');
    }

    /**
     * Check for having the rights
     * @param $rights
     * @return bool
     */
    public function hasRights($rights)
    {
        if (!is_array($rights))
        {
            $rights = [$rights];
        }
        return ($this->rights()->where('name', $rights)->count() > 0);
    }
}
