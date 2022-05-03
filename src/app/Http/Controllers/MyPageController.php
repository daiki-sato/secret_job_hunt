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
        // $form = $request->all();
        // unset($form['_token']);
        // User::create($form);
        // return redirect()('mypage.index')->with('success', '新規登録完了しました');

        $id = Auth::id();
        $user = User::find($id);
        $form = $request->all();
        unset($form['_token']);
        $user->fill($form)->save();
        return redirect('/edit')->with('success', '新規登録完了しました');
    }

    public function update(Request $request)
    {
        $user = new User();
        
        $user->password = $request->password;
        $user->first_name = $request->first_name; 
        $user->last_name = $request->last_name; 
        $user->first_name_ruby = $request->first_name_ruby;
        $user->last_name_ruby = $request->last_name_ruby; 
        $user->nickname = $request->nickname; 
        $user->sex = $request->sex; 
        $user->company = $request->company; 
        $user->department = $request->department; 
        $user->working_period = $request->working_period;

        $user->save();
        return redirect('mypage.index');
    }
}