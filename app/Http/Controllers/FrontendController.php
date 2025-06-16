<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Edition;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactResponse;

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
     * Retornar todos los posts disponibles en la base de datos al frontend.
     * Tambien incluye filtrado por categoria
     * 
     * @param Request $request
     * @return Vista admin.posts.index y array asociativo de posts
     */
    public function posts(Request $request)
    {
        $query = Post::with('category', 'tags')->where('active', true);

        //filtrar x categoria
        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category_id', $request->category);
        }

        //filtrar x buscador --> titulo, subtitulo o contenido
        if ($request->filled('query')) {
            $search = $request->get('query');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('subtitle', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            });
        }

        //filtrar x etiquetas
        if ($request->filled('tags')) {
            $tags = $request->get('tags');
            foreach ($tags as $tagId) {
                $query->whereHas('tags', function ($q) use ($tagId) {
                    $q->where('tags.id', $tagId);
                });
            }
        }

        //paginacion
        $posts = $query->paginate(6)->appends($request->all());

        //llevar categorias y tags al form
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts', [
            'posts' => $posts,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Retornar el post individual al frontend
     * 
     * @return Vista post y el "objeto" post
     */
    public function postById($id)
    {

        $post = Post::with(['category', 'tags'])->find($id);

        //Si el post no existe o no esta activo ir a 404
        if (!$post || $post->active == false) {
            abort(404);
        }

        return view('post', ['post' => $post]);
    }

    public function contact()
    {
        return view('contact');
    }

    /**
     * Retornar todas las ediciones disponibles en la base de datos al frontend.
     * 
     * @param Request $request
     * @return Vista admin.editions.index y array asociativo de editions
     */
    public function editions()
    {
        $editions = Edition::all();

        return view('editions', ['editions' => $editions]);
    }

    /**
     * Retornar la edicion individual al frontend
     * 
     * @return Vista edition y el "objeto" edition
     */
    public function editionById($id)
    {

        $edition = Edition::find($id);

        if (!$edition) {
            abort(404);
        }

        return view('edition', ['edition' => $edition]);
    }

    /**
     * Retornar la vista de respuesta de contacto al frontend
     * 
     * @param Request $request
     * @return Vista response-contact
     */
    public function responseContact(Request $request)
    {

        $request->validate([
            'problem' => 'required|min:10',
            'description' => 'required|min:50'
        ]);

        $user = Auth::user();

        $problem = $request->input('problem');
        $description = $request->input('description');

        //enviar mail
        Mail::to($user->email)->send(new ContactResponse($user, $problem, $description));

        return view('response-contact', ['user' => $user]);
    }

    /**
     * Retornar la vista de edicion adquirida al frontend
     * 
     * @return Vista acquired
     */
     public function acquired()
    {
        $user = Auth::user();
        $editionId = session('edition_id');

        // Si alguien entra directamente sin sesión redirigir
        if (!$editionId) {
            return redirect()->route('home');
        }

        $edition = Edition::find($editionId);

        //si intenta entrar x url, ir a home
        if (!$edition) {
            return redirect()->route('home');
        }

        return view('acquired', ['edition' => $edition, 'user' => $user]);
    }

    /**
     * Retornar la vista de edicion reembolsada al frontend
     * 
     * @return Vista refunded
     */
    public function refunded()
    {
        $user = Auth::user();
        $editionId = session('edition_id');

        // Si alguien entra directamente sin sesión redirigir
        if (!$editionId) {
            return redirect()->route('home');
        }

        $edition = Edition::find($editionId);

        //si intenta entrar x url, ir a home
        if (!$edition) {
            return redirect()->route('home');
        }

        return view('refunded', ['edition' => $edition, 'user' => $user]);
    }
}
