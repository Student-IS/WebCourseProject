<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaticContent extends Model
{
    protected $fillable = [
        'page_name',
        'ru_content', 'en_content'
    ];
}
