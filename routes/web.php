<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminTagsController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminEditionsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

//rutas para el frontend
Route::get('/', [FrontendController::class, 'home'])->name('home');
Route::get('/posts', [FrontendController::class, 'posts'])->name('posts');
Route::get('/posts/{id}', [FrontendController::class, 'postById'])->name('post')->whereNumber('id');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('/editions', [FrontendController::class, 'editions'])->name('editions');

//rutas backend
Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard'); // --> dashboard

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
Route::resource('/admin/posts', AdminPostsController::class);
Route::get('/admin/posts/{id}/delete', [AdminPostsController::class, 'delete'])->name('posts.delete');

Route::resource('/admin/editions', AdminEditionsController::class);
Route::resource('/admin/tags', AdminTagsController::class);
Route::resource('/admin/categories', AdminCategoriesController::class);
Route::resource('/admin/users', AdminUsersController::class);