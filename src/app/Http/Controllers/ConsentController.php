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
                'interview_id' => 11,
                'is_agreement' => $request->consent_type,
                'from_what_time' => '2022-05-11',
                'to_what_time' => '2022-05-11',
            ]
        );
        return view('consent.index');
    }
}