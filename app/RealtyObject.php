<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealtyObject extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    public function realtyType()
    {
        return $this->belongsTo('App\RealtyType','type_id','id');
    }

    public function realtyImages()
    {
        return $this->hasMany('App\RealtyImage','id','object_id');
    }

    public function booking()
    {
        return $this->hasOne('App\Booking','object_id','id');
    }
}
