<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = [];

    public function themes() : HasMany
    {
        return $this->hasMany(Theme::class);
    }

    public function profile() : BelongsTo{
        return $this->belongsTo(Profile::class);
    }

    public function tags(){
        return $this->MorphMany(Tag::class, 'taggable');
    }
}
