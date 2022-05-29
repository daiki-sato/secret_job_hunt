<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index()
    {
        $solvers = User::where('role_id', 3)->get();
        return view('review.index', ['solvers' => $solvers]);
    }
    public function show($solver_id)
    {
        $solver = User::where('id', $solver_id)->first();

        $good_users = DB::table('calls')
            ->where('solver_id', $solver_id)
            ->where('evaluation', true)
            ->join('users', 'users.id', '=', 'calls.user_id')
            ->select('users.nickname', 'calls.evaluation_comment', 'calls.call_end_time', 'calls.evaluation')
            ->get();

        $bad_users = DB::table('calls')
            ->where('solver_id', $solver_id)
            ->where('evaluation', false)
            ->join('users', 'users.id', '=', 'calls.user_id')
            ->select('users.nickname', 'calls.evaluation_comment', 'calls.call_end_time', 'calls.evaluation')
            ->get();

        return view('review.show', ['solver' => $solver, 'good_users' => $good_users, 'bad_users' => $bad_users]);
    }
}