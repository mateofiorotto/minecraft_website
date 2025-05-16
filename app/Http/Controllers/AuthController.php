<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
