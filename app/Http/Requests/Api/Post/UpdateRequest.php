<?php

namespace App\Http\Requests\Api\Post;

use Illuminate\Foundation\Http\FormRequest;

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
