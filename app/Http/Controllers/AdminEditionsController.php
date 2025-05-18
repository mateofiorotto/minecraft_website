<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edition;
use Illuminate\Support\Facades\Storage;

class AdminEditionsController extends Controller
{
    //CRUD de ediciones con resource

    /**
     * Retornar todas las ediciones de forma paginada
     * 
     * @return Vista admin.editions.index y array asociativo de ediciones
     */
    public function index(){

        $editions = Edition::paginate(6);

        return view('admin.editions.index', ['editions' => $editions]);
    }
    
    /**
     * Metodo para retornar la vista del formulario de creacion de una nueva edicion
     * 
     * @return Vista admin.editions.create y array asociativo de ediciones
     */
    public function create(){

        return view('admin.editions.create');
    }

    /**
     * Metodo que retorna la vista del formulario para editar una edicion
     * 
     * @param id ID de la edicion
     * @return Vista admin.editions.edit
     */
    public function edit($id){
        $edition = Edition::find($id);

        if (!$edition){
            abort(404);
        }

        return view('admin.editions.edit', ['edition' => $edition]);
    }

    /**
     * Metodo que retorna la vista de confirmacion para eliminar una edicion
     * 
     * @param id ID de la edicion
     * @return Vista admin.editions.delete
     */
    public function delete($id){
        $edition = Edition::find($id);

        if (!$edition){
            abort(404);
        }

        return view('admin.editions.delete', ['edition' => $edition]);
    }

    // Ahora los metodos CRUD

    /**
     * Metodo que almacena una nueva edicion en la base de datos
     * 
     * @param Request $request (titulo, subtitulo, contenido, imagen, bestseller, price)
     * @return Vista admin.editions.index
     */
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|min:10',
            'subtitle' => 'required|min:20',
            'content' => 'required|min:100',
            'image' => 'required|image|mimes:jpg,webp|max:1024',
            'bestseller' => 'nullable|boolean',
            'price' => 'required|numeric',
        ]);
        
        //manejo de imagenes
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('editions', 'public');
            $validated['image'] = $path;
        }

        Edition::create($validated);

        return redirect()
        ->route('editions.index')
        ->with('feedback.message', 'La edicion <strong>' . e($validated['title']) . '</strong> ha sido creada con exito');
    }

    /**
     * Metodo que actualiza una edicion existente en la base de datos
     * 
     * @param Request $request
     * @param Edition $edition id
     * @return Vista admin.editions.index
     */
    public function update(Request $request, $edition){

    $edition = Edition::find($edition);

    if (!$edition){
        abort(404);
    }

    $validated = $request->validate([
        'title' => 'required|min:10',
        'subtitle' => 'required|min:20',
        'content' => 'required|min:100',
        'image' => 'nullable|image|mimes:jpg,webp|max:1024',
        'bestseller' => 'nullable|boolean',
        'price' => 'required|numeric',
    ]);

    if ($request->hasFile('image')) {
        //borrar la imagen antigua
        Storage::disk('public')->delete($edition->image);
        $path = $request->file('image')->store('editions', 'public');
        $validated['image'] = $path;
    }

    $edition->update($validated);

     return redirect()
        ->route('editions.index')
        ->with('feedback.message', 'La edicion <strong>' . e($validated['title']) . '</strong> ha sido editada con exito');
}

    /**
     * Metodo que elimina una edicion de la base de datos
     * 
     * @param Edition $edition id
     * @return Vista admin.editions.index
     */
    public function destroy($edition){
        $edition = Edition::find($edition);

        //borrar img de la edicion de la db
        Storage::disk('public')->delete($edition->image);

        $edition->delete();

         return redirect()
        ->route('editions.index')
        ->with('feedback.message', 'La edicion <strong>' . e($edition['title']) . '</strong> ha sido eliminada con exito');
    }
}
