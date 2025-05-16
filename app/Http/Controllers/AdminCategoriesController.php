<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    /**
     * Retornar todas las categorias de forma paginada
     * 
     * @return Vista admin.categories.index
     */
    public function index(){

        $categories = Category::paginate(6);

        return view('admin.categories.index', ['categories' => $categories]);
    }
    
    /**
     * Metodo para retornar la vista del formulario de creacion de una nueva categoria
     * 
     * @return Vista admin.categories.create
     */
    public function create(){
        return view('admin.categories.create');
    }

    /**
     * Metodo que retorna la vista del formulario para editar una categoria
     * 
     * @param id ID de la categoria
     * @return Vista admin.categories.edit
     */
    public function edit($id){
        $category = Category::find($id);

        if (!$category){
            abort(404);
        }

        return view('admin.categories.edit', ['category' => $category]);
    }

    /**
     * Metodo que retorna la vista de confirmacion para eliminar una categoria
     * 
     * @param id ID de la categoria
     * @return Vista admin.categories.delete
     */
    public function delete($id){
        $category = Category::find($id);

        if (!$category){
            abort(404);
        }

        return view('admin.categories.delete', ['category' => $category]);
    }

    // Ahora los metodos CRUD

    /**
     * Metodo que almacena una nueva categoria en la base de datos
     * 
     * @param Request $request (nombre)
     * @return Vista admin.categories.index
     */
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3'
        ]);

        Category::create($validated);

        return redirect()
        ->route('categories.index')
        ->with('feedback.message', 'La categoria <strong>' . e($validated['name']) . '</strong> ha sido creada con exito');
    }

    /**
     * Metodo que actualiza una categoria existente en la base de datos
     * 
     * @param Request $request
     * @param Category $category id
     * @return Vista admin.categories.index
     */
    public function update(Request $request, $category){

    $category = Category::find($category);

    if (!$category){
        abort(404);
    }

    $validated = $request->validate([
        'name' => 'required|min:3'
    ]);

    $category->update($validated);

     return redirect()
        ->route('categories.index')
        ->with('feedback.message', 'La categoria <strong>' . e($validated['name']) . '</strong> ha sido editada con exito');
}

    /**
     * Metodo que elimina una categoria de la base de datos
     * 
     * @param Category $category id
     * @return Vista admin.categories.index
     */
    public function destroy($category){
        $category = Category::find($category);

         
        if ($category->posts()->whereNull('deleted_at')->count() > 0) {
            return redirect()
            ->route('categories.index')
            ->with('error.in.delete', 'No se puede eliminar la categoría porque tiene posts activos.');
        }

        $category->delete();

         return redirect()
        ->route('categories.index')
        ->with('feedback.message', 'La categoria <strong>' . e($category['name']) . '</strong> ha sido eliminada con exito');
    }
}
