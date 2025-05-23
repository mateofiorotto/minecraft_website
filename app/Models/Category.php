<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes; //activar los borrados logicos

    //definir categoria
    protected $fillable = [
        'name'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
