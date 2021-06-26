<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(Request $r){
        Contact::create([
            'name' => $r->name,
            'email' => $r->email,
            'subject' => $r->subject,
            'message' => $r->message
        ]);
        notify()->success("Message Send Successfully !!","Success");
        return redirect()->back();
    }
}
