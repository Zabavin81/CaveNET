<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {

    }

    public static function storeWithPost(Post $post, array $files){
        foreach ($files as $file) {
            $path = Storage::disk('public')->putFile('images', $file);
            $post->images()->create(['path' => $path]);
        }
    }
}
