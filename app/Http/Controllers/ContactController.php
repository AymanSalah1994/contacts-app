<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact as Contact;
use App\Models\Company as Company;
use App\Models\User as user;

use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $user = auth()->user();
        $companies = Company::userCompanies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies', '');
        $contacts  = Contact::userContacts()->latestFirst()->paginate(5);
        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $user = Auth::user();
        $companies = Company::userCompanies()->orderBy('name')->pluck('name', 'id')->prepend('All Companies','');
        return view('contacts.create', compact('companies'));
    }

    public function store(ContactRequest $request)
    {
        // dd(request('last_name'));
        // $validatedREsult = $request->validate(
        //     [
        //         'first_name' => 'required',
        //         'last_name' => 'required',
        //         'email' => 'required|email',
        //         'address' => 'required',
        //         'company_id' => 'required|exists:companies,id',
        //     ]
        // );
        // dd($request->all()) ;
        // Contact::create($request->all() + ['user_id' => auth()->id()]);
        $request->user()->contacts()->create($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact Created Successfulyl');
    }
    public function show(Contact $contact)
    {
        // $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
        // return $co->first_name ; 
    }

    public function edit(Contact $contact)
    {
        $user = Auth::user();
        $companies = Company::userCompanies()->get();
        // $contact  = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact', 'companies'));
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        // $request->validate(
        //     [

        //     ]
        // );
        // dd($request->id);
        // $editedContact = Contact::findOrFail($request->id);
        $contact->update($request->all());
        return redirect()->route('contacts.index')->with('message', 'Contact Edited Successfullyyy');
    }

    public function destroy(Contact $contact)
    {
        // 
        // $contactElement = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')->with('message', 'Contact Deleted SucceessFully');
    }
}
