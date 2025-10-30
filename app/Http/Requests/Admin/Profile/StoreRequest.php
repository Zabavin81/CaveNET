<?php

namespace App\Http\Requests\Admin\Profile;

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
            'username' => 'required|string|unique:profiles,username',
            'name' => 'required|string',
            'gender' => 'required|string',
            'country' => 'required|string',
            'date_of_birth' => 'required|date_format:Y-m-d',
        ];
    }

}
