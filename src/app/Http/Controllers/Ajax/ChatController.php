<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Events\MessageCreated;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index() {// 新着順にメッセージ一覧を取得

        return \App\Models\Message::orderBy('id', 'desc')->get();
    
    }
    
    public function create(Request $request) { // メッセージを登録
    
        $message = \App\Models\Message::create([
            'message' => $request->message,
            'thread_id' => 1,
            'sender_id' => 1,
        ]);
        event(new MessageCreated($message));
    }
}