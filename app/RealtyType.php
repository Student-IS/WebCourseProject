<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealtyType extends Model
{
    public function realtyObjects()
    {
        return $this->hasMany('App\RealtyObject','type_id','id');
    }
}
