<?php

namespace App\Http\Resources\Models;

use App\Http\Resources\Models\Profile;
use App\Http\Resources\Models\Tag;
use App\Http\Resources\Models\Theme;
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
