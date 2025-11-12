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
            'title' => $this->title,
            'body' => $this->body,
            'likes' => $this->likes,
            'published_at_from' => $this->published_at,
            'published_at_to' => $this->published_at,
            'views_from' => $this->views,
            'views_to' => $this->views,
        ];
    }

}
