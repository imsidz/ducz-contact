<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactSaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('welcome', compact('contacts'));
    }
    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->fname = $request->fname;
        $contact->lname = $request->lname;
        $contact->email = $request->email;
        $contact->number = $request->number;
        $contact->save();
        Mail::to($contact->email)->send(new ContactSaved($contact));

        return back()->with('success', 'Contact Added Success');
    }

    public function Update($id, Request $request)
    {
        $contact = Contact::find($id);
        $contact->fname = $request->fname;
        $contact->lname = $request->lname;
        $contact->email = $request->email;
        $contact->number = $request->number;
        $contact->save();
        Mail::to($contact->email)->send(new ContactSaved($contact));

        return back()->with('success', 'Contact Updated Success');
    }

    public function delete($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        return back()->with('success', 'Contact Deleted Success');
    }
}
