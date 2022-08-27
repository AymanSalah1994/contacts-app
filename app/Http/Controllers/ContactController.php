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
        $contacts  = Contact::latestFirst()->paginate(5);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $companies = Company::orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        return view('contacts.create', compact('companies'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
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
        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact Created Successfulyl');
    }

    public function edit($id)
    {
        $companies = Company::all();
        $contact  = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'company_id' => 'required|exists:companies,id'
            ]
        );
        // dd($request->id);
        $editedContact = Contact::findOrFail($request->id);
        $editedContact->update($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact Edited Successfullyyy');
    }

    public function destroy($id)
    {
        // 
        $contactElement = Contact::findOrFail($id);
        $contactElement->delete();
        return redirect()->route('contacts.index')->with('message', 'Contact Deleted SucceessFully');
    }
}
