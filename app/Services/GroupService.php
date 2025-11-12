<?php

namespace App\Services;


use App\Http\Resources\Models\Group;

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
