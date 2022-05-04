<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index()
    {
        // return view('mypage.index');

        $id = Auth::id();
        $user = User::find($id);
        return view('mypage.index',compact('user'));
    }

    public function edit(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('mypage.user_edit',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $user = User::find($id);
        
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->first_name_ruby = $request->input('first_name_ruby');
        $user->last_name_ruby = $request->input('last_name_ruby');
        $user->nickname = $request->input('nickname');
        $user->sex = $request->input('sex');
        $user->company = $request->input('company');
        $user->department = $request->input('department');
        $user->working_period = $request->input('working_period');

        $user->save();
        return redirect('my-page');
    }
}