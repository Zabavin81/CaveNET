<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();  //  ->paginate(9);
        $posts = PostResource::collection($posts)->resolve();
        return inertia('Client/Post/Index', compact('posts'));
    }

    public function show(Post $post){
        $post->load(['images', 'category', 'profile']);
        $post = PostResource::make($post)->resolve();
        return inertia('Client/Post/Show', compact('post'));
    }

    public function toggleLike(Post $post) {
        auth()->user()->profile->likedPosts()->toggle($post->id);
    }
}
