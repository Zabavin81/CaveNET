<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Follower\StoreFollowerRequest;
use App\Http\Requests\Api\Follower\UpdateFollowerRequest;
use App\Http\Resources\Models\Follower;
use Symfony\Component\HttpFoundation\Response;

class FollowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Follower::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFollowerRequest $request)
    {
        $data = $request->validated();
        Follower::create($data);
        return Follower::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(Follower $follower)
    {
        return $follower;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFollowerRequest $request, Follower $follower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Follower $follower)
    {
        $follower->delete();
        return response(['message' => 'follower deleted'], Response::HTTP_OK);
    }
}
