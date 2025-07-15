<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Edition;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Metodo que retorna la vista del perfil
     * 
     * @return Vista profile
     */
    public function profile(){
        $user = auth()->user();

    // Solo las ediciones compradas
    $editions = $user->editions()
        ->wherePivot('status', 'buyed')
        ->withPivot('status', 'buy_date')
        ->get();

    return view('profile', [
        'user' => $user,
        'editions' => $editions,
    ]);
    }

    /**
     * Metodo que retorna la vista del formulario para editar el perfil
     * 
     * @return Vista modify-profile
     */
    public function modifyProfileForm(){
        return view('modify-profile', ['user' => auth()->user()]);
    }

      /**
     * Metodo que actualiza el perfile de un usuario
     * 
     * 
     * @param Request $request
     * @return Vista home
     */
    public function modifyProfile(Request $request)
{
    $user = auth()->user();

    if (!$user) {
        abort(403);
    }

    $validated = $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'username' => 'required|regex:/^\S*$/|min:5|unique:users,username,' . $user->id,
        'password' => 'nullable|min:8|confirmed',
    ]);

    if ($request->filled('password')) {
        $validated['password'] = Hash::make($validated['password']);
    } else {
        unset($validated['password']);
    }

    $validated['role'] = $user->role;

    $user->update($validated);

    return redirect()
        ->route('home')
        ->with('feedback.message', 'Tu perfil se editó con éxito.');
    }

}
