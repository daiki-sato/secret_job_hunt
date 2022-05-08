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
        return view('review.index');
    }
    public function show($id)
    {

        $solver = User::where('id', $id)->first();
        $users_id = Call::where('solver_id', $id)
            ->where('evaluation', true)
            ->get('user_id');
        // dd($users_id);

        $good_users_id = [];
        foreach ($users_id as $good_user) {
            array_push($good_users_id, $good_user->user_id);
        };
        // dd($good_users_id);

        $good_users = [];
        foreach ($good_users_id as $good_user_id) {
            array_push($good_users, User::where('id', $good_user_id)->first());
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
        return view('review.show', ['solver' => $solver, 'good_reviews' => $good_reviews, 'bad_reviews' => $bad_reviews, 'good_points' => $good_points, 'bad_points' => $bad_points, 'good_users' => $good_users]);
    }
}
