<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //middleware que comprueba si el user es admin
        if(Auth::check() && Auth::user()->role == 'admin'){
            return $next($request);
        }

        //si no es admin se redirige al login
        return redirect()->route('auth.login')->with('feedback.message', 'Debes iniciar sesion como admin para acceder a esta página.');
    }
}
