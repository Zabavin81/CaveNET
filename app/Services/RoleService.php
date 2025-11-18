<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function update(Role $role, mixed $data) {
        $role->update($data);
        return $role->refresh();
    }

}
