<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUsersController extends Controller
{
    /**
     * Retornar todos los usuarios disponibles en la base de datos
     * 
     * @return Vista admin.users.index y array asociativo de users
     */
    public function index(){
        
        $users = User::all();

        return view('admin.users.index', ['users' => $users]);
    }
}
