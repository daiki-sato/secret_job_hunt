<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Wallet;
use App\Models\User;
use App\Models\Cash;
use Carbon\Carbon;
use PhpParser\Node\Expr\AssignOp\Concat;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::with(['contacts', 'wallets', 'cashes'])->get();

        $cashes = Cash::all();

        return view('admin.index', compact('users'));
    }
}
