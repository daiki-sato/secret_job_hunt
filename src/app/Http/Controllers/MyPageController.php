<?php

namespace App\Http\Controllers;

use App\Models\Cash;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPageController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->with(['calls'])->first();
        $apply = Cash::where('user_id', $id)->where('status', 'apply')->pluck('status')->first();
        $apply_hostories = Cash::where('user_id', $id)->get();

        $balance = Wallet::where('user_id', $id)->pluck('balance')->first();

        return view('mypage.index', compact('user', 'balance', 'apply', 'apply_hostories'));
    }

    public function edit(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('mypage.user_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->first_name_ruby = $request->input('first_name_ruby');
        $user->last_name_ruby = $request->input('last_name_ruby');
        $user->nickname = $request->input('nickname');
        $user->phone_number = $request->input('phone_number');
        $user->sex = $request->input('sex');
        $user->company = $request->input('company');
        $user->department = $request->input('department');
        $user->working_period = $request->input('working_period');

        $user->save();
        return redirect('my-page');
    }
    public function show()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->with(['calls'])->first();
        return view('mypage.evaluation', compact('user'));
    }

    public function toMoney(Request $request)
    {
        $id = Auth::id();

        if ($request->money_value >= 5000) {
            $commission = 0;
        } else {
            $commission = 220;
        }
        $toMoney = new Cash();
        $toMoney->user_id = $id;
        $toMoney->value = $request->money_value;
        $toMoney->status = $request->status;
        $toMoney->commission = $commission;

        $toMoney->save();
        return redirect('my-page')->with('flash_message', '申請完了！');
    }
}
