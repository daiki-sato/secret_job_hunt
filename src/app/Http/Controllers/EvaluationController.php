<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        return view('evaluation.index');
    }

    public function add(Request $request)
    {
        Call::create(
            [
                'thread_id' => 1,
                'user_id' => 1,
                'solver_id' => 2,
                'evaluation' => $request->evaluation,
                'evaluation_comment' => $request->evaluation_comment,
            ]
        );
        return redirect('evaluation')->with('message', '送信が完了しました');
    }
}