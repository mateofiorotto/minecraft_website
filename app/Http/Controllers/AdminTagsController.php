<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagsController extends Controller
{
    /**
     * Retornar todas las etiquetas disponibles en la base de datos
     * 
     * @return Vista admin.tags.index y array asociativo de tags
     */
    public function index(){
        
        $tags = Tag::all();

        return view('admin.tags.index', ['tags' => $tags]);
    }
}
