<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::group(['prefix'=> 'admin', 'middleware'=> ['auth',IsAdminMiddleware::class]], function () {
    Route::get('/posts',[PostController::class,'index'])->name('admin.posts.index');
    Route::get('/posts/create',[PostController::class,'create'])->name('admin.posts.create');
    Route::get('/posts/{post}',[PostController::class,'show'])->name('admin.posts.show');
    Route::post('/posts/',[PostController::class,'store'])->name('admin.posts.store');
    Route::get('/categories',[CategoryController::class,'index'])->name('admin.categories.index');
    Route::get('/categories/{category}',[CategoryController::class,'show'])->name('admin.categories.show');
    Route::get('/groups',[GroupController::class,'index'])->name('admin.groups.index');
    Route::get('/groups/{group}',[GroupController::class,'show'])->name('admin.groups.show');
    Route::get('/profiles',[ProfileController::class,'index'])->name('admin.profiles.index');
    Route::get('/profiles/create',[ProfileController::class,'create'])->name('admin.profiles.create');
    Route::post('/profiles',[ProfileController::class,'store'])->name('admin.profiles.store');
    Route::get('/profiles/{profile}',[ProfileController::class,'show'])->name('admin.profiles.show');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
});


require __DIR__.'/auth.php';
