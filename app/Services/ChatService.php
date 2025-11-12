<?php

namespace App\Services;

use App\Http\Resources\Models\Chat;

class ChatService
{
    /**
     * Create a new class instance.
     */
    public static function update(Chat $chat, $data)
    {
        $chat->update($data);
        return $chat->refresh();
    }
}
