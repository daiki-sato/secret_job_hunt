<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;
use App\Models\Call;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class EvaluationController extends Controller
{
    public function index()
    {
        return view('evaluation.index');
    }

    public function add(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        Call::create(
            [
                'thread_id' => 1,
                'user_id' => $user->id,
                'solver_id' => 2,
                'evaluation' => $request->evaluation,
                'evaluation_comment' => $request->evaluation_comment,
            ]
        );
        return redirect('evaluation')->with('message','送信が完了しました');
    }
}
