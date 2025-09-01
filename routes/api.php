<?php

use App\Http\Controllers\Api\ChatController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\FollowerController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\ThemeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/chats', ChatController::class);
Route::apiResource('/comments', CommentController::class);
Route::apiResource('/followers', FollowerController::class);
Route::apiResource('/groups', GroupController::class);
Route::apiResource('/likes', LikeController::class);
Route::apiResource('/messages', MessageController::class);
Route::apiResource('/posts', PostController::class);
Route::apiResource('/profiles', ProfileController::class);
Route::apiResource('/roles', RoleController::class);
Route::apiResource('/tags', TagController::class);
Route::apiResource('/themes', ThemeController::class);


