<?php

namespace App\Http\Resources\Models;

use App\Http\Resources\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function posts() : HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function taggable()
    {
        return $this->morphTo();
    }
}
