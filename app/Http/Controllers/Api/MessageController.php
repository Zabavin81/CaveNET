<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Message\StoreMessageRequest;
use App\Http\Requests\Api\Message\UpdateMessageRequest;
use App\Models\Message;
use App\Services\MessageService;
use Symfony\Component\HttpFoundation\Response;

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
    public function store(StoreMessageRequest $request)
    {
        $data = $request->validated();
        Message::create($data);
        return response(['message' => 'Message created successfully.'],Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        return $message;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        $data = $request->validated();
        MessageService::update($message, $data);
        return response(['message' => 'Message updated successfully.'],Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return response(['message' => 'Message deleted successfully.'],Response::HTTP_OK);
    }
}
