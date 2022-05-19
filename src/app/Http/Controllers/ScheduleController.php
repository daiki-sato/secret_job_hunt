<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\InterviewTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedule_interview_show.index');
    }
    public function solver()
    {
        $id = Auth::id();
        // dd($id);
        $confirmed_interview_date = Call::where('solver_id', $id)
            ->value('confirmed_interview_date');
        // dd($confirmed_interview_date);
        if ($confirmed_interview_date != null) {

            $id = Auth::id();

            $confirmed_interviews = Call::where('solver_id', $id)
                ->join('users', 'users.id', '=', 'calls.user_id')
                ->select('users.nickname', 'calls.confirmed_interview_date')
                ->get();

            $unanswered_interviews = InterviewTime::where('is_agreement', null)
                ->join('interviews', 'interviews.id', '=', 'interview_times.interview_id')
                ->join('users', 'users.id', '=', 'interviews.user_id')
                ->where('interviews.solver_id', $id)
                ->select('users.nickname', 'interview_times.from_what_time')
                ->get();

            return view('schedule_solver.index', ['confirmed_interviews' => $confirmed_interviews, 'unanswered_interviews' => $unanswered_interviews]);
        } else {
            return false;
        }
    }
}
