<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Wallet;
use App\Models\User;
use Carbon\Carbon;
use PhpParser\Node\Expr\AssignOp\Concat;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $wallets = Wallet::all();
        $users = User::with(['contacts','wallet'])->get();
        
        return view('admin.index', compact('contacts','wallets','users'));
    }    
}