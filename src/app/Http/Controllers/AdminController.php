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

        $users = User::with(['contacts', 'wallet'])->get();

        return view('admin.index', compact('users'));
    }

    public function save(Request $request)
    {

        // dd($request->status);
        $ids = $request->status;

        foreach ($ids as $id) {
            Contact::where('id', $id)
                ->update([
                    'is_read' => true,
                ]);
        }


        return redirect('admin');
    }
}
