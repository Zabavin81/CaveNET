<?php

namespace App\Http\Resources\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    protected $guarded = [];
    public function imageable()
    {
        return $this->morphTo();
    }

    public function getImgUrlAttribute() : string
    {
        return Storage::disk('public')->url($this->path);
    }
}
