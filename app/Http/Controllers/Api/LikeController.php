<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Like\StoreLikeRequest;
use App\Http\Requests\Api\Like\UpdateLikeRequest;
use App\Models\Like;
use Symfony\Component\HttpFoundation\Response;

class LikeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Like::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLikeRequest $request)
    {
        $data = $request->validated();
        Like::create($data);
        return response(['message' => 'Like added successfully.'],
            Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLikeRequest $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        $like->delete();
        return response(['message' => 'Like deleted successfully.'],
            Response::HTTP_OK);
    }

}
