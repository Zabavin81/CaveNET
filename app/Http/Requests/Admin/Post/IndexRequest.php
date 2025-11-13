<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string',
            'body' => 'nullable|string',
            'likes' => 'nullable|integer',
            'published_at_from' => 'nullable|date_format:Y-m-d',
            'published_at_to' => 'nullable|date_format:Y-m-d',
            'views_from' => 'nullable|integer',
            'views_to' => 'nullable|integer',
            'category_id' => 'nullable|exists:categories,id',
        ];
    }

}
