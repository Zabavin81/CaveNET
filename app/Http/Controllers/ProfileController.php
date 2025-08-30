<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

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
    public function store(Request $request)
    {
        $profile = Profile::create([
            "username" => Str::random(16),
            "name" => Str::random(16),
            "gender" => Str::random(16)
        ]);
        return $profile;

    }

    /**
     * Display the specified resource.
     */
    public function show(Profile  $profile)
    {
        return $profile;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Profile $profile)
    {
        dump($profile);
        $profile->update([
            "title" => Str::random(16),
            "status" => Str::random(16)
        ]);
        return $profile;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response(['message' => 'Profile deleted'], Response::HTTP_OK);
    }
}

