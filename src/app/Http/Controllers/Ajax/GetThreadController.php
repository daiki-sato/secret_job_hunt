<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Role;
use App\Models\Thread;
use App\Models\User;

class GetThreadController extends Controller
{
    public function index($userId, $roleId)
    {
        if ($roleId == Role::getIntervieweeId()) {
            return Thread::where('user_id', $userId)->with(['messages'])->get();
        } elseif ($roleId == Role::getSolverId()) {
            return Thread::where('solver_id', $userId)->with(['messages'])->get();
        }
    }

    public function getNickname($userId, $roleId)
    {
        if ($roleId == Role::getIntervieweeId()) {
            $threads = Thread::where('user_id', $userId)->with(['messages'])->get();
            $nicknames = [];
            foreach ($threads as $key => $thread) {
                $user_nickname = User::where('id', $thread->solver_id)->value("nickname");
                array_push($nicknames, $user_nickname);
            }
            return $nicknames;
        } elseif ($roleId == Role::getSolverId()) {
            $threads = Thread::where('solver_id', $userId)->with(['messages'])->get();
            $nicknames = [];
            foreach ($threads as $key => $thread) {
                $user_nickname = User::where('id', $thread->user_id)->select("nickname", "id")->first();
                array_push($nicknames, $user_nickname);
            }
            return $nicknames;
        }
    }

    public function messages($threadId)
    {
        return Message::where('thread_id', $threadId)->get();
    }
}