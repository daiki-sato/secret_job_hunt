<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Call;
use App\Models\User;
use App\Models\Thread;


class ReviewController extends Controller
{
    public function index()
    {
        $solvers = User::where('role_id', 3)->get();
        return view('review.index',['solvers'=>$solvers]);
    }
    public function show($id)
    {

        $solver = User::where('id', $id)->first();
        //グッドコメントシュトク
        $users_id = Call::where('solver_id', $id)
            ->where('evaluation', true)
            ->get('user_id');

        $good_users_id = [];
        foreach ($users_id as $good_user) {
            array_push($good_users_id, $good_user->user_id);
        };

        $good_users = [];
        foreach ($good_users_id as $good_user_id) {
            array_push($good_users, User::where('id', $good_user_id)->first());
        };
        //バッドコメントシュトク
        $bad_users_id = Call::where('solver_id', $id)
            ->where('evaluation', false)
            ->pluck('user_id');

        $bad_users = [];
        foreach ($bad_users_id as $bad_user_id) {
            array_push($bad_users, User::where('id', $bad_user_id)->first());
        };



        $good_reviews = Call::where('solver_id', $id)
            ->where('evaluation', true)
            ->get();
        $good_points = Call::where('solver_id', $id)
            ->where('evaluation', true)
            ->count();

        $bad_reviews = Call::where('solver_id', $id)
            ->where('evaluation', false)
            ->get();

        $bad_points = Call::where('solver_id', $id)
            ->where('evaluation', false)
            ->count();
        return view('review.show', ['solver' => $solver, 'good_reviews' => $good_reviews, 'bad_reviews' => $bad_reviews, 'good_points' => $good_points, 'bad_points' => $bad_points, 'good_users' => $good_users,'bad_users' => $bad_users]);
    }
}
