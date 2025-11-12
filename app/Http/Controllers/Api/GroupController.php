<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Group\StoreGroupRequest;
use App\Http\Requests\Api\Group\UpdateGroupRequest;
use App\Http\Resources\Models\Group;
use App\Services\GroupService;
use Symfony\Component\HttpFoundation\Response;

class GroupController extends Controller
{

    public function index()
    {
        return Group::all();
    }

    public function store(StoreGroupRequest $request)
    {
        $data = $request->validated();
        Group::create($data);
        return response(['message' => 'Group created successfully.'], Response::HTTP_OK);
    }

    public function show(Group $group)
    {
        return $group;
    }

    public function update(UpdateGroupRequest $request, Group $group)
    {
        $data = $request->validated();
        $group = GroupService::update($group, $data);
        dump($group);
        return response(['message' => 'Group updated successfully.'], Response::HTTP_OK);
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return response(["message" => "Group deleted"]
            , Response::HTTP_OK);
    }

}
