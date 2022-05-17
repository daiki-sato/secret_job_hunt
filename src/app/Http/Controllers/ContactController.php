<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index(){
       
        return view('contact.index');
    }
    public function add(Request $request)
    {
        $date = Carbon::parse();
        Contact::create(
            [
                'user_id' =>1,
                'contact_type' => $request->contact_type,
                'comment' => $request->comment,
                'contact_date' => $date,
            ]
        );
        return view('contact.index');
    }
}