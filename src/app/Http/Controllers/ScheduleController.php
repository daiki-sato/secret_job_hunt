<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\InterviewTime;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedule_interview_show.index');
    }
    public function solver()
    {
        $confirmed_interviews = Call::where('solver_id',2)
            ->join('users', 'users.id', '=', 'calls.user_id')
            ->select('users.nickname', 'calls.confirmed_interview_date')
            ->get();
            
        $unanswered_interviews = InterviewTime::where('is_agreement', null)
            ->join('interviews', 'interviews.id', '=', 'interview_times.interview_id')
            ->join('users', 'users.id', '=', 'interviews.user_id')
            ->where('interviews.solver_id', 2)
            ->select('users.nickname', 'interview_times.from_what_time')
            ->get();

        return view('schedule_solver.index', ['confirmed_interviews' => $confirmed_interviews, 'unanswered_interviews' => $unanswered_interviews]);
    }
}
