<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InterviewTime;


class ConsentController extends Controller
{
    public function index(){
        return view('consent.index');
    }
    public function add(Request $request)
    {
        InterviewTime::create(
            [
                'interview_id' =>1,
                'is_agreement' => $request->consent_type,
                'from_what_time' => '2022-05-11',
                'to_what_time' => '2022-05-11',
            ]
        );
        return view('consent.index');
    }
}
