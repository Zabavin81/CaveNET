<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::group(['prefix'=> 'admin'], function () {
    Route::get('/posts',[PostController::class,'index'])->name('admin.posts.index');
    Route::get('/posts/{post}',[PostController::class,'show'])->name('admin.posts.show');
    Route::get('/categories',[CategoryController::class,'index'])->name('admin.categories.index');
    Route::get('/categories/{category}',[CategoryController::class,'show'])->name('admin.categories.show');
    Route::get('/groups',[GroupController::class,'index'])->name('admin.groups.index');
    Route::get('/groups/{group}',[GroupController::class,'show'])->name('admin.group.show');
    Route::get('/profiles',[ProfileController::class,'index'])->name('admin.profiles.index');
    Route::get('/profiles/{profile}',[ProfileController::class,'show'])->name('admin.profile.show');
    Route::get('/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
});


require __DIR__.'/auth.php';
