<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes; //activar los borrados logicos

    //definir modelo post. NO incluyo los softdeletes porque no voy a hacer fillables ya que no tiene sentido crear registros eliminados
    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'image',
        'active',
        'category_id'
    ];
    //indicar la relacion con categorias
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //relacion con tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
