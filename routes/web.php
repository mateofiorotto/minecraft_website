<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminEditionsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminTagsController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//rutas para el frontend
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/posts', [FrontendController::class, 'posts'])->name('posts');
Route::get('/posts/{id}', [FrontendController::class, 'postById'])->name('post')->whereNumber('id');
Route::get('/editions', [FrontendController::class, 'editions'])->name('editions');
Route::get('/editions/{id}', [FrontendController::class, 'editionById'])->name('edition')->whereNumber('id');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
    Route::post('/response-contact', [FrontendController::class, 'responseContact'])->name('response-contact');
    //si un user quiere entrar x url al response, redirigir al contact    
    Route::get('/response-contact', function () {
    return redirect()->route('contact')->with('feedback.message', 'Debes enviar el formulario correctamente.');
    });
});

//rutas backend
//Dashboard
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');    
});

Route::group (['middleware' => ['auth', 'admin']], function () {
    Route::resource('/admin/posts', AdminPostsController::class);
    Route::get('/admin/posts/{id}/delete', [AdminPostsController::class, 'delete'])->name('posts.delete');

    Route::resource('/admin/editions', AdminEditionsController::class);
    Route::get('/admin/editions/{id}/delete', [AdminEditionsController::class, 'delete'])->name('editions.delete');

    Route::resource('/admin/categories', AdminCategoriesController::class);
    Route::get('/admin/categories/{id}/delete', [AdminCategoriesController::class, 'delete'])->name('categories.delete');

    Route::resource('/admin/tags', AdminTagsController::class);
    Route::get('/admin/tags/{id}/delete', [AdminTagsController::class, 'delete'])->name('tags.delete');

    Route::resource('/admin/users', AdminUsersController::class);
    Route::get('/admin/users/{id}/delete', [AdminUsersController::class, 'delete'])->name('users.delete');
});

//Rutas AUTH
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'auth'])->name('auth.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'createNewUser'])->name('auth.createNewUser');

//para que error 404 tome el usuario si esta logueado
Route::fallback(function(){
    return view('errors.404');
});
//rutas crud con resource
/**
 * Index --> mostrar todos los posts
 * Show --> mostrar un post individual
 * Create --> formulario para crear un post
 * Store --> metodo para guardar un post
 * Edit --> formulario para editar un post
 * Update --> metodo para actualizar un post
 * Destroy --> eliminar un post
 * 
 * Delete no existe, pero voy a crear una vista de confirmacion
 * 
 */