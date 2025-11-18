<?php

namespace App\Http\Resources\Models;

use App\Http\Resources\Models\Post;
use App\Http\Resources\Models\Profile;
use App\Http\Resources\Models\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function post () : BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function profiles () : BelongsTo{
        return $this->BelongsTo(Profile::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function views() {
        return $this->morphMany(View::class, 'viewable');
    }
}
