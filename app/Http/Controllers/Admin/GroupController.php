<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\StoreRequest;
use App\Http\Resources\Group\GroupResource;
use App\Models\Group;

class GroupController extends Controller
{

    public function index() {
        $groups = Group::all();
        $groups = GroupResource::collection($groups)->resolve();
        return inertia('Admin/Group/Index', compact('groups'));
    }

    public function show (Group $group) {
        $group = GroupResource::make($group)->resolve();
        return inertia('Admin/Group/Show', compact('group'));
    }

    public function create(){
        return inertia('Admin/Group/Create');
    }

    public function store(StoreRequest $request) {
        $data = $request->validated();
        $data['profile_id'] = 1;
        $group = Group::create($data);
        return GroupResource::make($group)->resolve();
    }
}
