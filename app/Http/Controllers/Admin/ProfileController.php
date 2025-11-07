<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        $profiles = ProfileResource::collection($profiles)->resolve();
        return inertia('Admin/Profile/Index', compact('profiles'));
    }

    public function show(Profile $profile){
        $profile = ProfileResource::make($profile)->resolve();
        return inertia('Admin/Profile/Show',compact('profile'));
    }

    public function create(){
        return inertia('Admin/Profile/Create');
    }

    public function store(StoreRequest $request){
        $data = $request->validated();
        $data['user_id'] = auth()->user()->profile->id;
        $profile = Profile::create($data);
        return ProfileResource::make($profile)->resolve();
    }
}
