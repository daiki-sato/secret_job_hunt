<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Thread;
use App\Models\User;

class GetThreadController extends Controller
{
    public function index($userId, $roleId)
    {
        if ($roleId == Role::getIntervieweeId()) {
            return Thread::with('messages')->where('user_id', $userId)->get();
        } elseif ($roleId == Role::getSolverId()) {
            return Thread::with('messages')->where('solver_id', $userId)->get();
        }
    }

    public function getNickname($userId)
    {
        return User::where('id', $userId)->value("nickname");
    }
}