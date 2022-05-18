<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedule_interview_show.index');
    }
    public function solver()
    {
        $confirmed_interviews = Call::select()
            ->join('users', 'users.id', '=', 'calls.user_id')
            ->select('users.nickname', 'calls.confirmed_interview_date')
            ->get();
        return view('schedule_solver.index', ['confirmed_interviews' => $confirmed_interviews]);
    }
}
