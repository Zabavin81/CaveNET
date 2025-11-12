<?php

namespace App\Http\Resources\Models;

use App\Http\Resources\Models\Chat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    public function chat() : BelongsTo{
        return $this->belongsTo(Chat::class);
    }
}
