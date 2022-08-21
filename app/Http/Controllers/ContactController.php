<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact as Contact;
use App\Models\Company as Company;

class ContactController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        $contacts  = Contact::orderBy('id', 'desc')->where(function ($query) {
            // Here i will check , if Company_id is Checked Then we will append Some Quey to the Builder 
            // Else No Appending 
            if (request('company_id')) {
                $companyID = request('company_id');
                $query->where('company_id', $companyID);
            }
        })->paginate(3);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        return view('contacts.create', compact('companies'));
    }

    public function show($id)
    {
        $contact = Contact::find($id);
        return view('contacts.show', compact('contact'));
        // return $co->first_name ; 
    }

    public function store(Request $request)
    {
        // dd(request('last_name'));
        $validatedREsult = $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'company_id' => 'required|exists:companies,id'
            ]
        );
        Contact::create($request->all()) ;
        return redirect()->route('contacts.index')->with('message','Contact Created Successfulyl') ;
    }
}