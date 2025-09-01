<?php

namespace App\Http\Requests\Api\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|string',
            'name' => 'required|string',
            'gender' => 'required|string',
            'country' => 'required|string',
            'date_of_birth' => 'required|date_format:Y-m-d H:i',
            'marital_status' => 'nullable|string',
            'avatar' => 'nullable|string',
        ];
    }
}
