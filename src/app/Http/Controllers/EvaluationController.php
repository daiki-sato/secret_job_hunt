<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index (){
        return view('evaluation.index');
    }
    public function add (Request $request){
        DB::table('calls')
        ->insert([
            'evaluation' => $request->evaluation,
            'evaluation_comment' => $request->evaluation_comment,
        ]);
        return view('evaluation.index');
    }
}
