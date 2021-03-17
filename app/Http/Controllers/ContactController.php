<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(20);
        return view('contact.index', compact('contacts'));
    }

    public function detail($id)
    {
        $contact = Contact::findOrFail($id);
        return view('contact.detail', compact('contact'));
    }
}
