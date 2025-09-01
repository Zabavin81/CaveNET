<?php

namespace App\Http\Controllers;

use App\Models\follower;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class FollowerController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     */
//    public function index()
//    {
//        return Follower::all();
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        $follower = Follower::create([
//            "title" => Str::random(16),
//        ]);
//        return $follower;
//
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(Follower  $follower)
//    {
//        return $follower;
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Follower $follower)
//    {
//        dump($follower);
//        $follower->update([
//            "title" => Str::random(16),
//            "status" => Str::random(16)
//        ]);
//        return $follower;
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(Follower $follower)
//    {
//        $follower->delete();
//        return response(['message' => 'follower deleted'], Response::HTTP_OK);
//    }
}

