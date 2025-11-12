<?php

namespace App\Services;

use App\Http\Resources\Models\Profile;

class ProfileService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function update(Profile $profile, mixed $data)
    {
        $profile->update($data);
        return $profile->refresh();
    }

}
