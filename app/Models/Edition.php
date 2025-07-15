<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Edition extends Model
{
    use SoftDeletes; //activar los borrados logicos

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'image',
        'bestseller',
        'price'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'acquisitions')
            ->withPivot(['status', 'buy_date'])
            ->withTimestamps();
    }
}
