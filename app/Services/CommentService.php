<?php

namespace App\Services;

use App\Http\Resources\Models\Comment;

class CommentService
{
    /**
     * Create a new class instance.
     */
    public static function update(Comment $comment, array $data)
    {
        $comment->update($data);
        return $comment->refresh();
    }
}
