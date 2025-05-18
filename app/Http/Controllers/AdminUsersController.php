<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    /**
     * Retornar todos los usuarios de forma paginada
     * 
     * @return Vista admin.users.index
     */
    public function index()
    {

        $users = User::paginate(6);

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Metodo para retornar la vista del formulario de creacion de un nueva usuario
     * 
     * @return Vista admin.users.create
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Metodo que retorna la vista del formulario para editar un usuario
     * 
     * @param id ID del usuario
     * @return Vista admin.users.edit
     */
    public function edit($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Metodo que retorna la vista de confirmacion para eliminar un usuario
     * 
     * @param id ID del usuario
     * @return Vista admin.users.delete
     */
    public function delete($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        return view('admin.users.delete', ['user' => $user]);
    }

    // Ahora los metodos CRUD

    /**
     * Metodo que almacena un nuevo usuario en la base de datos
     * 
     * @param Request $request (nombre, email, password, role, username)
     * @return Vista admin.users.index
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'role' => 'required',
            'username' => 'required|regex:/^\S*$/|unique:users|min:5'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()
            ->route('users.index')
            ->with('feedback.message', 'El usuario <strong>' . e($validated['name']) . '</strong> ha sido creado con exito');
    }

    /**
     * Metodo que actualiza un usuario existente en la base de datos
     * 
     * @param Request $request
     * @param user $user id
     * @return Vista admin.users.index
     */
    public function update(Request $request, $user)
    {

        $user = User::find($user);

        if (!$user) {
            abort(404);
        }

        //Solo podra cambiar name, password y rol, lo demas se mantiene

        $validated = $request->validate([
            'name' => 'required|min:3',
            'password' => 'required|min:8|confirmed',
            'role' => 'required',
        ]);

        $validated['username'] = $user['username'];
        $validated['email'] = $user['email'];

        $validated['password'] = Hash::make($validated['password']);

        $user->update($validated);

        return redirect()
            ->route('users.index')
            ->with('feedback.message', 'El usuario <strong>' . e($validated['name']) . '</strong> ha sido editado con exito');
    }

    /**
     * Metodo que elimina un usuario de la base de datos
     * 
     * @param user $user id
     * @return Vista admin.users.index
     */
    public function destroy($user)
    {
        $user = User::find($user);

        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('feedback.message', 'El usuario <strong>' . e($user['name']) . '</strong> ha sido eliminado con exito');
    }
}
