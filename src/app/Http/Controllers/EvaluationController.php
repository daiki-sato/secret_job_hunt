<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index (){
        return view('evaluation.index');
    }
    public function add (Request $request){
        return view('evaluation.index');
    }
}
