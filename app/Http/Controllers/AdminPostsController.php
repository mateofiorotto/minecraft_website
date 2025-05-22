<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class AdminPostsController extends Controller
{

    // Vistas: admin.posts.index, admin.posts.create, admin.posts.edit, admin.posts.delete
    // Metodos CRUD: index, update, destroy, store
    // Index cumple mas o menos los dos funciones; es READ y vista, retorna una vista porque estamos haciendo una solicitud GET

    /**
     * Retornar todos los posts de forma paginada
     * 
     * @return Vista admin.posts.index y array asociativo de posts
     */
    public function index(){

        $posts = Post::with('category')->paginate(6);

        return view('admin.posts.index', ['posts' => $posts]);
    }

    //No usare show
    
    /**
     * Metodo para retornar la vista del formulario de creacion de un nuevo post
     * 
     * @return Vista admin.posts.create y array asociativo de categorias
     */
    public function create(){
        $categories = Category::all();

        return view('admin.posts.create', ['categories' => $categories]);
    }

    /**
     * Metodo que retorna la vista del formulario para editar un post
     * 
     * @param id ID del post
     * @return Vista admin.posts.edit
     */
    public function edit($id){
        $categories = Category::all();
       
        $post = Post::with('category')->find($id);

        if (!$post){
            abort(404);
        }

        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Metodo que retorna la vista de confirmacion para eliminar un post
     * 
     * @param id ID del post 
     * @return Vista admin.posts.delete
     */
    public function delete($id){
        $post = Post::with('category')->find($id);

        if (!$post){
            abort(404);
        }

        return view('admin.posts.delete', ['post' => $post]);
    }

    // Ahora los metodos CRUD

    /**
     * Metodo que almacena un nuevo post en la base de datos
     * 
     * @param Request $request (titulo, subtitulo, contenido, imagen, activo, categoria)
     * @return Vista admin.posts.index
     */
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|min:10',
            'subtitle' => 'required|min:20',
            'content' => 'required|min:100',
            'image' => 'required|image|mimes:jpg,webp|max:1024',
            'active' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id'
        ]);
        
        //manejo de imagenes
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validated['image'] = $path;
        }

        Post::create($validated);

        return redirect()
        ->route('posts.index')
        ->with('feedback.message', 'El post <strong>' . e($validated['title']) . '</strong> ha sido creado con exito');
    }

    /**
     * Metodo que actualiza un post existente en la base de datos
     * 
     * @param Request $request (titulo, subtitulo, contenido, imagen, activo, categoria)
     * @param Post $post id
     * @return Vista admin.posts.index
     */
    public function update(Request $request, $post){

    $post = Post::find($post);

    if (!$post){
        abort(404);
    }

    $validated = $request->validate([
        'title' => 'required|min:10',
        'subtitle' => 'required|min:20',
        'content' => 'required|min:100',
        'image' => 'nullable|image|mimes:jpg,webp|max:1024',
        'active' => 'nullable|boolean', 
        'category_id' => 'exists:categories,id',
    ]);

    if ($request->hasFile('image')) {
        //borrar la imagen antigua
        Storage::disk('public')->delete($post->image);
        $path = $request->file('image')->store('posts', 'public');
        $validated['image'] = $path;
    }

    $post->update($validated);

     return redirect()
        ->route('posts.index')
        ->with('feedback.message', 'El post <strong>' . e($validated['title']) . '</strong> ha sido editado con exito');
}

    /**
     * Metodo que elimina un post de la base de datos
     * 
     * @param Post $post id
     * @return Vista admin.posts.index
     */
    public function destroy($post){
        $post = Post::find($post);

        //borrar img del post de la db
        Storage::disk('public')->delete($post->image);

        $post->delete();

         return redirect()
        ->route('posts.index')
        ->with('feedback.message', 'El post <strong>' . e($post['title']) . '</strong> ha sido eliminado con exito');
    }

}
