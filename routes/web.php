<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');

Route::get('/register', [RegisterController::class, 'registrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');
// Profile
Route::get('/{user:username}', [ProfileController::class, 'show'])->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::get('/{user:username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/{user:username}/update', [ProfileController::class, 'update'])->name('profile.update');
    // Post image upload
    Route::post('/images', [ImageController::class, 'store'])->name('images.store');
    // Posts
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    // Comment
    Route::post('/{user:username}/posts/{post}', [CommentController::class, 'store'])->name('comments.store');
    // Like/Dislike a post
    Route::post('/{user:username}/posts/{post}/likes', PostLikesController::class)->name('posts.likes')->middleware('auth');
    // Follow/Unfollow a user
    Route::post('/{user:username}/follows', FollowController::class)->name('users.follows');
});

// Show a single post
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name('posts.show');
