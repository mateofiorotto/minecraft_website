<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class FrontendController extends Controller
{
    /**
     * Retornar la vista home al frontend
     * 
     * @return Vista home
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Retornar todos los posts disponibles en la base de datos al frontend
     * 
     * @return Vista admin.posts.index y array asociativo de posts
     */
    public function posts(){
        
        $posts = Post::all();

        return view('posts', ['posts' => $posts]);
    }

    /**
     * Retornar el post individual al frontend
     * 
     * @return Vista post y el "objeto" post
     */
    public function postById($id){

        $post = Post::find($id);

        //Si el post no existe o no esta activo ir a 404
        if(!$post || $post->active == false){
            abort(404);
        }

        return view('post', ['post' => $post]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function editions()
    {
        return view('editions');
    }
}
