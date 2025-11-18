<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Tag::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tag = Tag::create([
            "title" => Str::random(16),
        ]);
        return $tag;

    }

    /**
     * Display the specified resource.
     */
    public function show(Tag  $tag)
    {
        return $tag;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Tag $tag)
    {
        dump($tag);
        $tag->update([
            "title" => Str::random(16),
        ]);
        return $tag;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response(['message' => 'Tag deleted'], Response::HTTP_OK);
    }
}
