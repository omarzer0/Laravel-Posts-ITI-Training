<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



// Route::get('/posts', [PostController::class, 'index']);

// Route::get('/posts/create', [PostController::class, 'create']);

// Route::post('/posts', [PostController::class, 'store']);

// Route::get('/posts/{id}', [PostController::class, 'show']);

// Route::get('/posts/{id}/edit', [PostController::class, 'edit']);

// Route::delete('/posts/{id}', [PostController::class, 'destroy']);

Route::resource('posts',PostController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
