<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', fn () => view('welcome'))->name('welcome');

Route::get('/register', [RegisterController::class, 'registrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
// Profile
Route::get('/{user:username}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/{user:username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/{user:username}/edit', [ProfileController::class, 'update'])->name('profile.update');
// Post image upload
Route::post('/images', [ImageController::class, 'store'])->name('images.store');
// Posts
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
// Comment
Route::post('/{user:username}/posts/{post}', [CommentController::class, 'store'])->name('comments.store');
// Likes
Route::post('/{user:username}/posts/{post}/likes', PostLikesController::class)->name('posts.likes');
