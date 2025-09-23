<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class View extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function viewedPost()
    {
        return $this->morphedByMany(Post::class, 'viewable');
    }

    public function viewable()
    {
        return $this->morphTo();
    }
}
