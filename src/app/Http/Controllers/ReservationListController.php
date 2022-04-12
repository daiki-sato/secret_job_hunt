<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationListController extends Controller
{
    /**
     * 一覧ページ
     */
    public function index()
    {
        return view('reservation-list.index');
    }
}