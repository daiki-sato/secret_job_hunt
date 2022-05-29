<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Call;

class GetCallController extends Controller
{
    public function index($threadId)
    {
        return Call::where('thread_id', $threadId)->value("call_room_id");
    }
}