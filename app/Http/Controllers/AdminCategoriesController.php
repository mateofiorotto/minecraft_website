<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    /**
     * Retornar todas las categorias disponibles en la base de datos
     * 
     * @return Vista admin.categories.index y array asociativo de categories
     */
    public function index(){
        
        $categories = Category::all();

        return view('admin.categories.index', ['categories' => $categories]);
    }
}
