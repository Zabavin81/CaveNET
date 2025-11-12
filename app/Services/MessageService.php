<?php

namespace App\Services;

use App\Http\Resources\Models\Message;

class MessageService
{
    /**
     * Create a new class instance.
     */
    public static function update(Message $message, array $data)
    {
        $message->update($data);
        return $message->refresh();
    }
}
