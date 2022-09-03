<?php

namespace App\Http\Controllers\Settings;

use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        // This Means the Profile page Only Accesses if the user is Auth , 
        // And When he is "auth" we will show his Data ! using request()->user()
    }
    //
    public function edit()
    {
        // return "This si Edit Get Page" ; 
        return view('settings.profile', [
            'user' => auth()->user()
        ]);
    }
    public function update(ProfileRequest $request)
    {
        $request->user()->update($request->validated());
        return redirect()->route('settings.profile.edit')->with('message', "Account Data Updated SuccessFully!");
        // dd('Updated!') ; 
    }
}
