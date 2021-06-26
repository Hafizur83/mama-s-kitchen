<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::latest()->get();
        return view('backend.contact.index', compact('contact'));
    }

    public function show($id)
    {
        $contact = Contact::where('id',$id)->first();
        return view('backend.contact.show',compact('contact'));
    }


    public function destroy($id) 
    {
        Contact::where('id',$id)->delete();
        notify()->success("Message Deleted Successfully !!","Success");
        return redirect()->back();
    }
}
