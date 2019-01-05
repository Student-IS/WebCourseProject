<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'ru_title', 'en_title',
        'ru_short', 'en_short',
        'ru_text', 'en_text',
        'image'
    ];
}
