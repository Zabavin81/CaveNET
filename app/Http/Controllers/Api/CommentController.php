<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Comment\StoreCommentRequest;
use App\Http\Requests\Api\Comment\UpdateCommentRequest;
use App\Models\Comment;
use App\Services\CommentService;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Comment::all();
    }

    public function store(StoreCommentRequest $request)
    {
        $data = $request->validated();
        $comment = Comment::create($data);
        return $comment;
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return $comment;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $data = $request->validated();
        return CommentService::update($comment, $data);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response(["message" => "comment deleted successfully"],
            Response::HTTP_OK);
    }

}
