<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'profile_id' => 'required|integer|exists:profiles,id',
            //new
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:5120',
        ];
    }

    // до валидации (хорошо)
    protected function prepareForValidation() {
        return $this->merge([
            'profile_id' => auth()->user()->profile->id
        ]);
    }

}
