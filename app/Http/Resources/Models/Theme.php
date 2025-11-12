<?php

namespace App\Http\Resources\Models;

use App\Http\Resources\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Theme extends Model
{

    use SoftDeletes;
    protected $guarded = [];

public function group(): BelongsTo
{
    return $this->belongsTo(Group::class);
}

}
