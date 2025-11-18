<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;

class TagService
{

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function update(Tag $tag, mixed $data)
    {
        $tag->update($data);
        return $tag->refresh();
    }

    public static function storeWithPost(Post $post, array $data) : void
    {
        $body = $data['body'];
        $newTags = self::extractHashtags($body);
        $newTags = array_values(array_unique(array_map('mb_strtolower', $newTags)));
        if (!empty($newTags)) {
            $post->tags()->whereNotIn('title', $newTags)->delete();
        } else {
            $post->tags()->delete();
        }

        foreach ($newTags as $t) {
            $existing = $post->tags()->withTrashed()->where('title', $t)->first(
            );
            if ($existing) {
                $existing->restore();
            } else {
                $post->tags()->create(['title' => $t]);
            }
        }
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
