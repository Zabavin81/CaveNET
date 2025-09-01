<?php

namespace App\Services;

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

    public static function update(Tag $tag, mixed $data) {
        $tag->update($data);
        return $tag->refresh();
    }

}
