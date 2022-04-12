<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class MyPageController extends Controller
{
    public function index()
    {
        return view('mypage.index');
    }
}