<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\IndexRequest;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Models\Category;
use App\Http\Resources\Models\Post;
use App\Services\PostService;
use Illuminate\Support\Facades\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostController extends Controller
{
    public function index(IndexRequest $request){
        $data = $request->validated();
        $posts = Post::filter($data)->latest()->get();
        $posts = PostResource::collection($posts)->resolve();
        $categories = CategoryResource::collection(Category::all())->resolve();

        if(Request::wantsJson()){
            return $posts;
        }
        return inertia('Admin/Post/Index',compact('posts','categories'));
    }

    public function show(Post $post)
    {
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

    public function destroy(Post $post) {
        $post->delete();
        return response()->json(
            ['message' => 'Post deleted'],
            ResponseAlias::HTTP_OK
        );
    }
}
