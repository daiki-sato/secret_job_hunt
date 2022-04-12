<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        return view('message.index');
    }

    public function store()
    {
        // TODO:修正してください。
        return "ok";
    }
}