<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Role;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    { // 新着順にメッセージ一覧を取得
        return Message::get();
    }

    public function create(Request $request)
    { // メッセージを登録
        $message = Message::create([
            'message' => $request->message,
            'thread_id' => 1,
            'sender_id' => Role::getIntervieweeId(),
        ]);
        return $message;
    }
}