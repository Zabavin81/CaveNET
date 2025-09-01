<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\StoreProfileRequest;
use App\Http\Requests\Api\Profile\UpdateProfileRequest;
use App\Models\Profile;
use App\Services\ProfileService;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Profile::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        $data = $request->validated();
        Profile::create($data);
        return response(['message' => 'Profile created successfully.'],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return $profile;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile)
    {
        $data = $request->validated();
        ProfileService::update($profile, $data);
        return response(['message' => 'Profile updated successfully.'],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response(['message' => 'Profile deleted successfully.'],Response::HTTP_OK);
    }
}
