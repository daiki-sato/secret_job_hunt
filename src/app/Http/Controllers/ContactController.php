<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
       
        return view('contact.index');
    }
    public function add(Request $request)
    {
        Contact::create(
            [
                'user_id' =>1,
                'contact_type' => $request->contents,
                'comment' => $request->comment,
                'contact_date' => "2022-05-21",
            ]
        );
        return view('contact.index');
    }
}
