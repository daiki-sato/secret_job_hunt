<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Models\Cash;
use Carbon\Carbon;
use PhpParser\Node\Expr\AssignOp\Concat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::with(['contacts', 'wallets', 'cashes'])->get();

        $cashes = Cash::all();

        return view('admin.index', compact('users'));
    }

    public function MovePaymentStatusDone(Request $request)
    {

        $ids = $request->status;

        foreach ($ids as $id) {
            Cash::where('id', $id)
                ->update([
                    'is_read' => 1,
                ]);
        }
        return redirect('admin');
    }
    public function MovePaymentStatusBacklog(Request $request)
    {

        $ids = $request->status;

        foreach ($ids as $id) {
            Cash::where('id', $id)
                ->update([
                    'is_read' => 0,
                ]);
        }
        return redirect('admin');
    }
    

    public function mv_done(Request $request)
    {
        $ids = $request->status;
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
        foreach ($ids as $id) {
            Contact::where('id', $id)
                ->update([
                    'is_read' => 1,
                ]);
        }
        
        return redirect('admin');
    }
}
