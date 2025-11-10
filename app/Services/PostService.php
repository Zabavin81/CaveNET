<?php

namespace App\Services;

use App\Exceptions\PostException;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{

    /**
     * Create a new class instance.
     */
    public static function update(Post $post, array $data): Post
    {
        $post->update($data);
        return $post->refresh();
    }

    public static function storePost(array $data): Post
    {
        try {
            DB::beginTransaction();
            $files = $data['images'] ?? null;
            $data['published_at'] = now();
            unset($data['images']);
            $post = Post::create($data);
            if (!empty($files)) {
                ImageService::storeWithPost($post, $files);
            }
            TagService::storeWithPost($post, $data);
            DB::commit();
            return $post->load(['category', 'profile', 'images', 'tags']);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw PostException::storeFailed($exception);
        }
    }

    public static function updatePost(Post $post, array $data): Post
    {
        try {
            DB::beginTransaction();
            $data = $data['post'];
            if (!empty($data['images'])) {
                ImageService::storeWithPost($post, $data['images']);
            }
            unset($data['images']);
            $post->update($data);
            TagService::storeWithPost($post, $data);

            DB::commit();
            return $post->load(['category', 'profile', 'images', 'tags']);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw PostException::storeFailed($exception);
        }
    }

}
