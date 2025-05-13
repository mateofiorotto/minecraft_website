<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edition;

class AdminEditionsController extends Controller
{
    //CRUD de ediciones con resource

    /**
     * Retornar todas las ediciones disponibles en la base de datos
     * 
     * @return Vista admin.editions.index y array asociativo de editions
     */
    public function index(){
        
        $editions = Edition::all();

        return view('admin.editions.index', ['editions' => $editions]);
    }
}
