<?php

namespace App\Http\Resources\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    protected $guarded = [];
    use SoftDeletes;

}
