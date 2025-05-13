<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'image',
        'bestseller',
        'price'
    ];
}
