<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Retornar el dashboard del admin
     * 
     * @return Vista admin.dashboard
     */
    public function dashboard(){
        return view('admin.dashboard');
    }
}
