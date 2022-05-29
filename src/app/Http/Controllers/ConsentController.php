<?php

namespace App\Http\Controllers;

use App\Models\InterviewTime;
use Illuminate\Http\Request;

class ConsentController extends Controller
{
    public function index()
    {
        return view('consent.index');
    }
    public function add(Request $request)
    {
        // TODO::後でinterview_id、from_what_time、to_what_timeを可変にします
        InterviewTime::create(
            [
                'interview_id' => $request->interview_id,
                'is_agreement' => $request->consent_type,
                'from_what_time' => $request->from_what_time,
                'to_what_time' => $request->to_what_time,
            ]
        );
        return view('consent.index');
    }
}