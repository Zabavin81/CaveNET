<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ThemeController;
use Illuminate\Support\Facades\Route;

Route::get('/posts/index', [PostController::class, 'index']);
Route::get('/posts/create', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/update/{post}', [PostController::class, 'update']);
Route::get('/posts/destroy/{post}', [PostController::class, 'destroy']);

Route::get('/chats/index', [ChatController::class, 'index']);
Route::get('/chats/create', [ChatController::class, 'store']);
Route::get('/chats/{chat}', [ChatController::class, 'show']);
Route::get('/chats/update/{chat}', [ChatController::class, 'update']);
Route::get('/chats/destroy/{chat}', [ChatController::class, 'destroy']);

Route::get('/comments/index', [CommentController::class, 'index']);
Route::get('/comments/create', [CommentController::class, 'store']);
Route::get('/comments/{comment}', [CommentController::class, 'show']);
Route::get('/comments/update/{comment}', [CommentController::class, 'update']);
Route::get('/comments/destroy/{comment}', [CommentController::class, 'destroy']);

Route::get('/followers/index', [FollowerController::class, 'index']);
Route::get('/followers/create', [FollowerController::class, 'store']);
Route::get('/followers/{follower}', [FollowerController::class, 'show']);
Route::get('/followers/update/{follower}', [FollowerController::class, 'update']);
Route::get('/followers/destroy/{follower}', [FollowerController::class, 'destroy']);

Route::get('/groups/index', [GroupController::class, 'index']);
Route::get('/groups/create', [GroupController::class, 'store']);
Route::get('/groups/{group}', [GroupController::class, 'show']);
Route::get('/groups/update/{group}', [GroupController::class, 'update']);
Route::get('/groups/destroy/{group}', [GroupController::class, 'destroy']);

Route::get('/likes/index', [LikeController::class, 'index']);
Route::get('/likes/create', [LikeController::class, 'store']);
Route::get('/likes/{like}', [LikeController::class, 'show']);
Route::get('/likes/update/{like}', [LikeController::class, 'update']);
Route::get('/likes/destroy/{like}', [LikeController::class, 'destroy']);

Route::get('/messages/index', [MessageController::class, 'index']);
Route::get('/messages/create', [MessageController::class, 'store']);
Route::get('/messages/{message}', [MessageController::class, 'show']);
Route::get('/messages/update/{message}', [MessageController::class, 'update']);
Route::get('/messages/destroy/{message}', [MessageController::class, 'destroy']);

Route::get('/profiles/index', [ProfileController::class, 'index']);
Route::get('/profiles/create', [ProfileController::class, 'store']);
Route::get('/profiles/{profile}', [ProfileController::class, 'show']);
Route::get('/profiles/update/{profile}', [ProfileController::class, 'update']);
Route::get('/profiles/destroy/{profile}', [ProfileController::class, 'destroy']);

Route::get('/reposts/index', [RepostController::class, 'index']);
Route::get('/reposts/create', [RepostController::class, 'store']);
Route::get('/reposts/{repost}', [RepostController::class, 'show']);
Route::get('/reposts/update/{repost}', [RepostController::class, 'update']);
Route::get('/reposts/destroy/{repost}', [RepostController::class, 'destroy']);

Route::get('/roles/index', [RoleController::class, 'index']);
Route::get('/roles/create', [RoleController::class, 'store']);
Route::get('/roles/{role}', [RoleController::class, 'show']);
Route::get('/roles/update/{role}', [RoleController::class, 'update']);
Route::get('/roles/destroy/{role}', [RoleController::class, 'destroy']);

Route::get('/tags/index', [TagController::class, 'index']);
Route::get('/tags/create', [TagController::class, 'store']);
Route::get('/tags/{tag}', [TagController::class, 'show']);
Route::get('/tags/update/{tag}', [TagController::class, 'update']);
Route::get('/tags/destroy/{tag}', [TagController::class, 'destroy']);

Route::get('/themes/index', [ThemeController::class, 'index']);
Route::get('/themes/create', [ThemeController::class, 'store']);
Route::get('/themes/{theme}', [ThemeController::class, 'show']);
Route::get('/themes/update/{theme}', [ThemeController::class, 'update']);
Route::get('/themes/destroy/{theme}', [ThemeController::class, 'destroy']);

