<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function realtyObject()
    {
        return $this->belongsTo('App\RealtyObject','object_id','id');
    }
    public function users()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
