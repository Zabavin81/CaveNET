<?php

namespace App\Http\Controllers;

use App\Http\Resources\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Chat::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $chat = Chat::create([
            "title" => Str::random(16),
            "status" => Str::random(16)
        ]);
        return $chat;

    }

    /**
     * Display the specified resource.
     */
    public function show(Chat  $chat)
    {
        return $chat;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Chat $chat)
    {
        dump($chat);
        $chat->update([
            "title" => Str::random(16),
            "status" => Str::random(16)
        ]);
        return $chat;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        $chat->delete();
        return response(['message' => 'chat deleted'], Response::HTTP_OK);
    }
}
