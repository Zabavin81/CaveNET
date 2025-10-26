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
    Route::get('/posts',[PostController::class,'index']);
    Route::get('/dashboard',[DashboardController::class,'index']);
});


require __DIR__.'/auth.php';
