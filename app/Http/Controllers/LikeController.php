<?php

namespace App\Http\Controllers;

use App\Http\Resources\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class LikeController extends Controller
{
//    /**
//     * Display a listing of the resource.
//     */
//    public function index()
//    {
//        return Like::all();
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        $like = Like::create([
//            "title" => Str::random(16),
//            "status" => Str::random(16)
//        ]);
//        return $like;
//
//    }
//
//    /**
//     * Display the specified resource.
//     */
//    public function show(Like  $like)
//    {
//        return $like;
//    }
//
//    /**
//     * Update the specified resource in storage.
//     */
//    public function update(Like $like)
//    {
//        dump($like);
//        $like->update([
//            "title" => Str::random(16),
//            "status" => Str::random(16)
//        ]);
//        return $like;
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     */
//    public function destroy(Like $like)
//    {
//        $like->delete();
//        return response(['message' => 'Like deleted'], Response::HTTP_OK);
//    }
}

