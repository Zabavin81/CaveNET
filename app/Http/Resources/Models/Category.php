<?php

namespace App\Http\Resources\Models;

use App\Http\Resources\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded = [];

    public function post () : hasMany{
        return $this->HasMany(Post::class);
    }
}
