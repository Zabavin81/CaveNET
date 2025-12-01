<?php

use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\FeedController;
use App\Http\Controllers\Client\GroupController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



//Route::get('/posts',[PostController::class,'index']);
//Route::get('/groups',[GroupController::class,'index']);
//Route::get('/profiles',[ProfileController::class,'index']);
//Route::get('/categories',[CategoryController::class,'index']);




Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/feed',[FeedController::class,'index'])->name('client.posts.feed');
    Route::get('/posts/{post}',[PostController::class,'show'])->name('client.posts.show');
    Route::post('/posts/{post}/likes',[PostController::class,'toggleLike'])->name('client.posts.likes.toggle');
    Route::get('/profiles/personal',[ProfileController::class,'personal'])->name('client.profiles.personal');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
