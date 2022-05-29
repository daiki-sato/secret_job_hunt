<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {

        return view('contact.index');
    }
    public function add(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        $date = Carbon::parse();
        Contact::create(
            [
                'user_id' => $user->id,
                'contact_type' => $request->contact_type,
                'comment' => $request->comment,
                'contact_date' => $date,
            ]
        );
        return redirect('my-page');
    }
}