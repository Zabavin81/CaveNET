<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::orderBy('id', 'desc')->get();
        return PostResource::collection($post)->resolve();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $post = Post::create([
          'title' => Str::random(16),
          'body' => Str::random(16)
        ]);

        dump($post);
        return response([
          "message" => "Post created"

          ], ResponseAlias::HTTP_OK
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return PostResource::make($post)->resolve();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Post $post)
    {
        dump($post);
        $post -> update(
          ["title" => Str::random(16),
            "body" => Str::random(16)
          ]
        );
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        dump($post);
        $post->delete();
        return response([
          'message' => 'post deleted'
        ], ResponseAlias::HTTP_OK);
    }

}
