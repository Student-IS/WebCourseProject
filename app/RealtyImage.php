<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealtyImage extends Model
{
    public function realtyObject()
    {
        return $this->belongsTo('App\RealtyObject','object_id','id');
    }
}
