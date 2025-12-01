<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(){
        $profiles = Profile::all();
        $profiles = ProfileResource::collection($profiles)->resolve();
        return inertia('Client/Profile/Index', compact('profiles'));
    }

    public function personal () {
        $posts = auth()->user()->profile->posts;
        $posts = PostResource::collection($posts)->resolve();
        return inertia('Client/Profile/Personal', compact('posts'));
    }
}
