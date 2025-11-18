<?php

namespace App\Services;


use App\Models\Group;

class GroupService
{
    /**
     * Create a new class instance.
     */
    public static function update(Group $group, array $data)
    {
        $group->update($data);
        return $group->refresh();
    }
}
