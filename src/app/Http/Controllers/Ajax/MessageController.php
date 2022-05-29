<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function get($threadId)
    {
        return Message::where("thread_id", $threadId)->get();
    }

    public function create(Request $request)
    {
        $message = Message::create([
            'message' => $request->message,
            'thread_id' => $request->thread_id,
            'sender_id' => $request->sender_id,
        ]);
        return $message;
    }

    public function delete($messageId)
    {
        $message = new Message;
        $message->where('id', $messageId)->delete();
        return $message;
    }
}