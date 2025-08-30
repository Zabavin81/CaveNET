<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Comment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $comment = Comment::create([
            "body" => Str::random(16),
        ]);
        return $comment;

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment  $comment)
    {
        return $comment;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Comment $comment)
    {
        dump($comment);
        $comment->update([
            "body" => Str::random(16),
        ]);
        return $comment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response(['message' => 'comment deleted'], Response::HTTP_OK);
    }
}
