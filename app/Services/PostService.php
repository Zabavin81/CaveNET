<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService
{
    /**
     * Create a new class instance.
     */
    public static function update(Post $post, array $data) : Post
    {
        $post->update($data);
        return $post->refresh();
    }

    public static function storePost(array $data) : Post{
        if (!empty($data['image'])) {
            $data['img_path'] = Storage::disk('public')->putFile('images', $data['image']);
        }
        unset($data['image']);
        return Post::create($data);
    }
}
