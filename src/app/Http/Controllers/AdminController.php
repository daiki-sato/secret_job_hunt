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

        $users = User::with(['contacts', 'wallet'])
            ->get();

        return view('admin.index', compact('users'));
    }

    public function mv_done(Request $request)
    {

        $ids = $request->status;
        // dd($ids);

        foreach ($ids as $id) {
            Contact::where('id', $id)
                ->update([
                    'is_read' => 0,
                ]);
        }
        return redirect('admin');
    }

    public function mv_backlog(Request $request)
    {
        $ids = $request->status;
        // dd($ids);

        foreach ($ids as $id) {
            Contact::where('id', $id)
                ->update([
                    'is_read' => 1,
                ]);
        }


        return redirect('admin');
    }
}
