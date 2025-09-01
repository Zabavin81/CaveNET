<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Chat\StoreChatRequest;
use App\Http\Requests\Api\Chat\UpdateChatRequest;
use App\Http\Resources\Chat\ChatResource;
use App\Models\Chat;
use App\Services\ChatService;
use Illuminate\Http\Response;

class ChatController extends Controller
{

    public function index()
    {
        $chat = Chat::orderBy('id', 'asc')->get();
        return ChatResource::collection($chat);
    }

    public function show(Chat $chat)
    {
        return new ChatResource($chat);
    }

    public function store(StoreChatRequest $request)
    {
        $data = $request->validated();
        $chat = Chat::create($data);
        return ChatResource::make($chat)->resolve();
    }

    public function update(Chat $chat, UpdateChatRequest $request)
    {
        $data = $request->validated();
        $chat = ChatService::update($chat, $data);
        return ChatResource::make($chat)->resolve();
    }

    public function destroy(Chat $chat)
    {
        $chat->delete();
        return response([
          'message' => 'post deleted successfully',
        ],
          Response::HTTP_OK);
    }

}
