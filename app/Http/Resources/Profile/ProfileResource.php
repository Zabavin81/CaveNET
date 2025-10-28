<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'name' => $this->name,
            'gender' => $this->gender,
            'country' => $this->country,
            'date_of_birth' => $this->date_of_birth,
            'marital_status' => $this->marital_status,
            'avatar' => $this->avatar,
        ];
    }

}
