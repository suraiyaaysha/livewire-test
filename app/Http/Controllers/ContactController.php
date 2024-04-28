<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Show all contacts
    public function index()
    {
        return view('contacts.index');
    }

    // create New contacts
    public function create()
    {
        return view('contacts.create');
    }
}
