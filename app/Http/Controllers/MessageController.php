<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Message::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = Message::create([
            "title" => Str::random(16),
        ]);
        return $message;

    }

    /**
     * Display the specified resource.
     */
    public function show(Message  $message)
    {
        return $message;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Message $message)
    {
        dump($message);
        $message->update([
            "body" => Str::random(16),
        ]);
        return $message;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return response(['message' => 'Message deleted'], Response::HTTP_OK);
    }
}
