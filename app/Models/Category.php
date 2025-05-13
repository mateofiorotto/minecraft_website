<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //definir categoria
    protected $fillable = [
        'name'
    ];

    public function news()
    {
        return $this->hasMany(Post::class);
    }
}
