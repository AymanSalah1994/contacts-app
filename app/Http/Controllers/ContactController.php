<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact as Contact;
use App\Models\Company as Company;

class ContactController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies','');
        $contacts  = Contact::orderBy('first_name', 'asc')->where(function ($query){
            // Here i will checl , if Company_id is Checked Then we will append Some Quey to the Builder 
            // Else No Appending 
            if (request('company_id')) {
                $companyID = request('company_id') ; 
                $query->where('company_id' , $companyID);
            }
        })->paginate(3);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact'));
        // return $co->first_name ; 
    }
}
