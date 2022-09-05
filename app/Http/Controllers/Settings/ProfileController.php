<?php

namespace App\Http\Controllers\Settings;

use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        return view('settings.profile', [
            'user' => auth()->user()
        ]);
    }
    public function update(ProfileRequest $request)
    {
        // $allRequestData = $request->validated();
        // if ($request->hasFile('profile_picture')) {
        //     $picture = $request->profile_picture;

        //     // dump($picture->getClientOriginalName());
        //     // dump($picture->getClientOriginalExtension());
        //     // dump($picture->getClientSize());
        //     // It was ClientSize , But Changed in Newer Versions to getSize
        //     // dump($picture->getSize());
        //     // dd($picture->getClientMimeType());
        //     $pre_fileName = "profile-picture-";
        //     $mid_fileName = $request->user()->id;
        //     $extension_fileName = $picture->getClientOriginalExtension();
        //     $fileName = $pre_fileName . $mid_fileName . "." . $extension_fileName;
        //     $picture->move(public_path('uploads'), $fileName);
        //     $allRequestData['profile_picture'] = $fileName;
        // }
        $allRequestData = $request->handleRequest() ; 

        $request->user()->update($allRequestData);
        return redirect()->route('settings.profile.edit')->with('message', "Account Data Updated SuccessFully!");
    }
}
