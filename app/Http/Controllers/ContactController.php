<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact as Contact ; 
use App\Models\Company as Company ; 
class ContactController extends Controller
{
    public function index () {
        $companies = Company::orderBy('name')->pluck('name','id')->all() ; 
        $contacts  = Contact::orderBy('first_name','asc')->paginate(5) ; 
        return view ('contacts.index',compact('contacts','companies')) ; 
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
