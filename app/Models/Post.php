<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasFactory;


    protected $guarded = [];

    public function tag(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function category(): belongsTo{
        return $this->belongsTo(Category::class);
    }

//    public function comments(): HasMany{
//        return $this->hasMany(Comment::class);
//    }

    public function profile(): BelongsTo {
        return $this->belongsTo(Profile::class);
    }

    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes(){
        return $this->morphToMany(Profile::class, 'likeable');
    }

    public function views(){
        return $this->morphMany(View::class, 'viewable');
    }

    public function files(){
        return $this->morphMany(File::class, 'fileable');
    }
    public function tags () {
        return $this->morphMany(Tag::class, 'taggable');
    }

}
