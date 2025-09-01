<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'body' => 'required|string',
            'likes' => 'nullable|int',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date_format:Y-m-d H:i',
            'profile_id' => 'nullable|int',
            'category_id' => 'nullable|int',
        ];
    }

}
