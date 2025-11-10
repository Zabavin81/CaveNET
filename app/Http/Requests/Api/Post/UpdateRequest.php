<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    /*    public function rules(): array
       {

           return [
               'title' => 'required|string|unique:posts,title,' . $this->post->id,
               'body' => 'required|string',
               'likes' => 'nullable|int',
               'is_published' => 'nullable|boolean',
               'published_at' => 'nullable|date_format:Y-m-d H:i',
               'profile_id' => 'nullable|int',
               'category_id' => 'nullable|int',
           ];
    }
    */
    public function rules(): array
    {
        return [
            'post.title' => 'required|string',
            'post.body' => 'required|string',
            'post.category_id' => 'required|integer|exists:categories,id',
            'post.profile_id' => 'required|integer|exists:profiles,id',
            //new
            'post.images' => 'nullable|array',
            'post.images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'post.profile_id' => auth()->user()->profile->id,
        ]);
    }

}
