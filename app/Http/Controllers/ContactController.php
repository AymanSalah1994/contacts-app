<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact as Contact ; 
class ContactController extends Controller
{
    public function index () {
        return view ('contacts.index') ; 
    }

    public function create() {
        return view('contacts.create');
    }

    public function show($id) {
        $co = Contact::find($id);
        return view('contacts.show', compact('co'));
        // return $co->first_name ; 
    }
}
