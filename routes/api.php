<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/index', ApiPostController::class, 'index');
