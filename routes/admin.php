<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\GroupController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Client\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::group(['prefix'=> 'admin'], function () {
    Route::get('/posts',[PostController::class,'index'])->name('admin.posts.index');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/posts/{post}',[PostController::class,'show'])->name('admin.posts.show');
});


require __DIR__.'/auth.php';
