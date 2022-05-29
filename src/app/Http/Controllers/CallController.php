<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallController extends Controller
{
    public function index(Request $request)
    {
        $path = $request->path();
        $callRoomId = str_replace('call/', '', $path);
        return view('call.index', compact("callRoomId"));
    }
}