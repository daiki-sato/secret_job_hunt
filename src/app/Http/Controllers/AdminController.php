<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Wallet;
use App\Models\User;
use App\Models\Cash;
use Carbon\Carbon;
use PhpParser\Node\Expr\AssignOp\Concat;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::with(['contacts', 'wallets', 'cashes'])->get();

        $cashes = Cash::all();

        return view('admin.index', compact('users'));
    }

    public function UpdatePaymentStatus(Request $request)
    {

        $id = Auth::id();
        $cash = Cash::where('user_id', $id)->get();
        dd($cash);
        $cash->status = $request->input('status');
        $cash->save();
        return redirect()->route('admin');;
    }
}
