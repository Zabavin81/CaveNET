<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class FeedController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();  //  ->paginate(9);
        $posts = PostResource::collection($posts)->resolve();
        return inertia('Client/Post/Feed', compact('posts'));
    }
}
