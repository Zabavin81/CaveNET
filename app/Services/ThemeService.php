<?php

namespace App\Services;

use App\Http\Resources\Models\Theme;

class ThemeService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function update(Theme $theme, array $data) {
        $theme->update($data);
        return $theme->refresh();
    }

}
