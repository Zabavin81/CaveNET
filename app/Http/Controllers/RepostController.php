<?php

namespace App\Http\Controllers;

use App\Models\Repost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class RepostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Repost::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $repost = Repost::create([
            "content" => Str::random(16)
        ]);
        return $repost;

    }

    /**
     * Display the specified resource.
     */
    public function show(Repost  $repost)
    {
        return $repost;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Repost $repost)
    {
        dump($repost);
        $repost->update([
            "content" => Str::random(16)
        ]);
        return $repost;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repost $repost)
    {
        $repost->delete();
        return response(['message' => 'Repost deleted'], Response::HTTP_OK);
    }
}

