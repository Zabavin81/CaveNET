<?php

namespace App\Http\Resources\Models;

use App\Http\Resources\Models\Message;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function messages() : HasMany{
        return $this->hasMany(Message::class);
    }
}
