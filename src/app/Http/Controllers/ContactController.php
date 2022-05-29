<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index()
    {

        return view('contact.index');
    }
    public function add(Request $request, $id)
    {
        // $user = User::find($id);
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
        return view('contact.index');
    }
}
