<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Post\StoreRequest;
use App\Http\Requests\Api\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostController extends Controller
{

    public function index()
    {
        //title
        //category_id
        //published_at
        //views
        $post = Post::query();
        if (isset($data['title'])) {
            $post->where('title', $data['title']);
        }
        $posts = $post->get();
        $post = Post::orderBy('id', 'asc')->get();
        return PostResource::collection($post);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create($data);
        return PostResource::make($post)->resolve();
    }

    public function update(Post $post, UpdateRequest $request)
    {
        $data = $request->validated();
        $post = PostService::update($post, $data);
        return PostResource::make($post)->resolve();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return response([
            'message' => 'post deleted successfully',
        ],
            ResponseAlias::HTTP_OK);
    }

}
