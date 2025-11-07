<?php

namespace App\Services;

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
    public static function update(Post $post, array $data) : Post
    {
        $post->update($data);
        return $post->refresh();
    }

    public static function storePost(array $data) : Post{

        $files = !empty($data['images']) ? Arr::wrap($data['images']) : [];
        unset($data['images']);
        $data['published_at'] = now();
        $post = Post::create($data);
        $tags = self::extractHashtags($data['body']);
        foreach ($tags as $tag) {
            $post->tags()->firstOrCreate([
                'title'=>mb_strtolower($tag)]
            );
        }

        foreach ($files as $file) {
            $path = Storage::disk('public')->putFile('images', $file);
            $post->images()->create([
                'path' => $path
            ]);
        }
        return $post->load(['category', 'profile','images','tags']);
    }
    public static function updatePost(Post $post, array $data): Post
    {
        return DB::transaction(function () use ($post, $data) {

            $files = !empty($data['images']) ? Arr::wrap($data['images']) : [];
            unset($data['images']);

            $post->update($data);

            $body = $data['body'] ?? $post->body;
            $newTags = self::extractHashtags($body);
            $newTags = array_values(array_unique(array_map(fn($t) => mb_strtolower($t, 'UTF-8'), $newTags)));

            if (!empty($newTags)) {
                $post->tags()->whereNotIn('title', $newTags)->delete();
            } else {
                $post->tags()->delete();
            }

            foreach ($newTags as $t) {
                $existing = $post->tags()->withTrashed()->where('title', $t)->first();
                if ($existing) {
                    $existing->restore();
                } else {
                    $post->tags()->create(['title' => $t]);
                }
            }

            foreach ($files as $file) {
                $path = Storage::disk('public')->putFile('images', $file);
                $post->images()->create(['path' => $path]);
            }

            return $post->load(['category', 'profile', 'images', 'tags']);
        });
    }

    protected static function extractHashtags(string $text): array
    {
        preg_match_all('/#([\p{L}\p{N}_-]{2,50})/u', $text, $m);
        $tags = $m[1] ?? [];
        $tags = array_map('trim', $tags);
        $tags = array_filter($tags, fn($t) => $t !== '');
        return array_values($tags);
    }

}
