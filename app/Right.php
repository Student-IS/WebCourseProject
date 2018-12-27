<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User','users__rights','right_id','user_id');
    }
}
