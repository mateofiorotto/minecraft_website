<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagsController extends Controller
{
    /**
     * Retornar todas las etiquetas de forma paginada
     * 
     * @return Vista admin.tags.index
     */
    public function index(){

        $tags = Tag::paginate(6);

        return view('admin.tags.index', ['tags' => $tags]);
    }
    
    /**
     * Metodo para retornar la vista del formulario de creacion de una nueva etiqueta
     * 
     * @return Vista admin.tags.create
     */
    public function create(){
        return view('admin.tags.create');
    }

    /**
     * Metodo que retorna la vista del formulario para editar una etiqueta
     * 
     * @param id ID de la etiqueta
     * @return Vista admin.tags.edit
     */
    public function edit($id){
        $tag = Tag::find($id);

        if (!$tag){
            abort(404);
        }

        return view('admin.tags.edit', ['tag' => $tag]);
    }

    /**
     * Metodo que retorna la vista de confirmacion para eliminar una etiqueta
     * 
     * @param id ID de la etiqueta
     * @return Vista admin.tags.delete
     */
    public function delete($id){
        $tag = Tag::find($id);

        if (!$tag){
            abort(404);
        }

        return view('admin.tags.delete', ['tag' => $tag]);
    }

    // Ahora los metodos CRUD

    /**
     * Metodo que almacena una nueva etiqueta en la base de datos
     * 
     * @param Request $request (nombre)
     * @return Vista admin.tags.index
     */
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3'
        ]);

        Tag::create($validated);

        return redirect()
        ->route('tags.index')
        ->with('feedback.message', 'La etiqueta <strong>' . e($validated['name']) . '</strong> ha sido creada con exito');
    }

    /**
     * Metodo que actualiza una etiqueta existente en la base de datos
     * 
     * @param Request $request
     * @param Tag $tag id
     * @return Vista admin.tags.index
     */
    public function update(Request $request, $tag){

    $tag = Tag::find($tag);

    if (!$tag){
        abort(404);
    }

    $validated = $request->validate([
        'name' => 'required|min:3'
    ]);

    $tag->update($validated);

     return redirect()
        ->route('tags.index')
        ->with('feedback.message', 'La etiqueta <strong>' . e($validated['name']) . '</strong> ha sido editada con exito');
}

    /**
     * Metodo que elimina una etiqueta de la base de datos
     * 
     * @param Tag $tag id
     * @return Vista admin.tags.index
     */
    public function destroy($tag){
        $tag = Tag::find($tag);

         
        if ($tag->posts()->whereNull('deleted_at')->count() > 0) {
            return redirect()
            ->route('tags.index')
            ->with('error.in.delete', 'No se puede eliminar la etiqueta porque tiene posts activos.');
        }

        $tag->delete();

         return redirect()
        ->route('tags.index')
        ->with('feedback.message', 'La etiqueta <strong>' . e($tag['name']) . '</strong> ha sido eliminada con exito');
    }
}
