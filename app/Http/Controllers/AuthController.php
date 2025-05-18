<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Mostrar vista del login
     * 
     * @return Vista auth.login
     */
    public function login(){
        return view('auth.login');
    }

    /**
     * Mostrar vista del registro
     */
    public function register(){
        return view('auth.register');
    }

    /**
     * Metodo para autenticar al usuario
     * 
     * @param Request $request (username, password)
     * 
     * @return Vista home
     */
    public function auth(Request $request){

        //Validar
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request->only(['username', 'password']);

        if(Auth::attempt($credentials)){
            return redirect()
            ->intended(route('home'));
        }

        return redirect()
        ->route('auth.login')
        ->withInput()
        ->with('feedback.message', 'Los datos ingresados son incorrectos');
    }

    /**
     * Metodo para cerrar sesion
     * 
     * @return Vista auth.login
     */

    public function logout(Request $request){
        Auth::logout();

        //borramos sesion y refrescamos su id, regeneramos el token csrf
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
        ->route('auth.login')
        ->with('feedback.message', 'Sesion cerrada con exito');
    }

    /**
     * Metodo para registrar un nuevo usuario
     */

      public function createNewUser(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'username' => 'required|regex:/^\S*$/|unique:users|min:5'
        ]);

        $validated['password'] = Hash::make($validated['password']);

         $validated['role'] = 'user';

        User::create($validated);

        return redirect()
            ->route('home')
            ->with('feedback.message', 'El usuario <strong>' . e($validated['name']) . '</strong> ha sido creado con exito');
    }
}
