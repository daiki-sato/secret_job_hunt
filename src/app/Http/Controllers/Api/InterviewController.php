<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Interview;
use App\Models\InterviewTime;
use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function post(Request $request)
    {
        foreach ($request->solverId as $solver_id) {
            $interviews = Interview::create(
                [
                    'user_id' => $request->userId,
                    'solver_id' => $solver_id,
                ]
            );
            $interview_id = $interviews->id;
            $interview_time = InterviewTime::create(
                [
                    'interview_id' => $interview_id,
                    'from_what_time' => $request->interviewTimes['startDate'],
                    'to_what_time' => $request->interviewTimes['endDate'],
                ]
            );
        }

        return "OK";
    }
}