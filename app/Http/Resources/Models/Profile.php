<?php

namespace App\Http\Resources\Models;

use App\Http\Resources\Models\Post;
use App\Http\Resources\Models\Tag;
use App\Http\Resources\Models\User;
use App\Http\Resources\Models\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likedPosts()
    {
        return $this->morphedByMany(Post::class, 'likable');
    }

    public function views(){
        return $this->morphMany(View::class, 'viewable');
    }

    public function tags () {
        return $this->morphMany(Tag::class, 'taggable');
    }
}
