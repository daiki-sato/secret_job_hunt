<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wallet;

class GetUserBalanceController extends Controller
{
    public function index($userId)
    {
        return Wallet::where('user_id', $userId)->value("balance");
    }
}