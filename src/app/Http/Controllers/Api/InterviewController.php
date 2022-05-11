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

    public function sample(Request $request)
    {
        $solversId = [2, 4, 5];
        foreach ($solversId as $solver_id) {
            $interviews = Interview::create(
                [
                    'user_id' => 1,
                    'solver_id' => $solver_id,
                ]
            );
            $interview_id = $interviews->id;
            $interview_time = InterviewTime::create(
                [
                    'interview_id' => $interview_id,
                    'from_what_time' => "2020/11/11 12:10",
                    'to_what_time' => "2020/11/11 12:20",
                ]
            );
        }

        // return "OK";
        return redirect('my-page');
    }
}