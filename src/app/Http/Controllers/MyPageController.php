<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wallet;
use App\Models\ToMoney;
use App\Models\Call;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class MyPageController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->with(['calls'])->first();
        $apply = ToMoney::where('user_id', $id)->where('status', 'apply')->pluck('status')->first();

        $balance = Wallet::where('user_id', $id)->pluck('balance')->first();

        return view('mypage.index', compact('user', 'balance', 'apply'));
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

    public function tomoney(Request $request)
    {
        $id = Auth::id();
        $user = User::where('id', $id)->with(['calls'])->first();
        $balance = Wallet::where('user_id', $id)->pluck('balance')->first();

        if ($request->money_value >= 5000) {
            $commission = 0;
        } else {
            $commission = 220;
        }
        $tomoney = new ToMoney();
        $tomoney->user_id = $id;
        $tomoney->value = $request->money_value;
        $tomoney->status = $request->status;
        $tomoney->commission = $commission;

        $tomoney->save();
        return redirect('my-page')->with('flash_message', '申請完了！');
    }
}
