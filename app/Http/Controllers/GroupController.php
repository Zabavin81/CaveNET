<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Group::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $group = Group::create([
            "title" => Str::random(16),
            "description" => Str::random(16)
        ]);
        return $group;

    }

    /**
     * Display the specified resource.
     */
    public function show(Group  $group)
    {
        return $group;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Group $group)
    {
        dump($group);
        $group->update([
            "title" => Str::random(16),
            "description" => Str::random(16)
        ]);
        return $group;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return response(['message' => 'Group deleted'], Response::HTTP_OK);
    }
}
