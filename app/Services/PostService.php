<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Arr;
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

        $files = !empty($data['images']) ? Arr::wrap($data['images']) : [];
        unset($data['images']);

        $post = Post::create($data);

        foreach ($files as $file) {
            $path = Storage::disk('public')->putFile('images', $file);
            $post->images()->create([
                'path' => $path
            ]);
        }
        return $post->load(['category', 'profile','images']);
    }
}
