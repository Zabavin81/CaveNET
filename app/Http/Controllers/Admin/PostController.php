<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Post\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(){
        $posts = Post::latest()->get();
        $posts = PostResource::collection($posts)->resolve();
        return inertia('Admin/Post/Index',compact('posts'));
    }

    public function show(Post $post)
    {
        // Загружаем relations
        $post->load(['images', 'category', 'profile']);
        $post = PostResource::make($post)->resolve();
        return inertia('Admin/Post/Show', compact('post'));
    }

    public function create(){
        $categories = CategoryResource::collection(Category::all())->resolve();
        return inertia('Admin/Post/Create',compact('categories'));
    }

    public function store(StoreRequest $request){
        $data = $request->validated();
        $post = PostService::storePost($data);
        return PostResource::make($post)->resolve();
    }

    public function edit(Post $post) {
        $post = PostResource::make($post->load(['images','category','profile']))->resolve();
        $categories = CategoryResource::collection(Category::all())->resolve();
        return inertia('Admin/Post/Edit',compact('post','categories'));
    }

    public function update(UpdateRequest $request, Post $post){
        $post = PostService::updatePost($post, $request->validated());
        return PostResource::make(
            $post->load(['images','category','profile','tags'])
        )->resolve();
    }
}
