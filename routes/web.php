<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PerfilController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Comentarios\ComentarioController;
use App\Http\Controllers\Follow\FollewerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Likes\LikeController;
use App\Http\Controllers\Post\ImagenController;
use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('auth.index');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');

Route::get('/login',[LoginController::class,'index'])->name('auth.login');
Route::post('/login',[LoginController::class,'login'])->name('auth.ingresar');
Route::post('/logout', [LoginController::class, 'logout'])->name('auth.logout');

Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('pefil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('pefil.store');

Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('post.show');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('post.destroy');

Route::post('/{user:username}/post/{post}', [ComentarioController::class,'store'])->name('comentarios.store');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('post.imagen');

Route::post('/posts/{post}/likes',[LikeController::class, 'store'])->name('likes.store');
Route::delete('/posts/{post}/likes',[LikeController::class, 'destroy'])->name('likes.delete');

Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');

Route::post('/{user:username}/follow', [FollewerController::class, 'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow', [FollewerController::class, 'destroy'])->name('users.unfollow');