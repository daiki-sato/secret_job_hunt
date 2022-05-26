<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\InterviewTime;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $role_id = Auth::user()->role_id;

        if ($role_id === Role::getIntervieweeId()) {
            $confirmed_interviews = Call::where('user_id', $id)
                ->whereNotNull('confirmed_interview_date')
                ->join('users', 'users.id', '=', 'calls.solver_id')
                ->select('users.nickname', 'calls.confirmed_interview_date')
                ->get();
            return view('schedule_solver.index', ['confirmed_interviews' => $confirmed_interviews]);
        } elseif ($role_id === Role::getSolverId()) {
            $confirmed_interviews = Call::where('solver_id', $id)
                ->whereNotNull('confirmed_interview_date')
                ->join('users', 'users.id', '=', 'calls.user_id')
                ->select('users.nickname', 'calls.confirmed_interview_date')
                ->get();
            return view('schedule_solver.index', ['confirmed_interviews' => $confirmed_interviews]);
        }
    }
}
