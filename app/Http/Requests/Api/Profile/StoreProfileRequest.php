<?php

namespace App\Http\Requests\Api\Profile;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
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
