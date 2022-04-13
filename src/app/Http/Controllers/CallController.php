<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallController extends Controller
{
    public function index(Request $request)
    {
        return view('call.index');
    }
}
