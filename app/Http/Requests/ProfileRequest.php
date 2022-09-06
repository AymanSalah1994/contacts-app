<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ProfileRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'company' => 'nullable',
            'bio' => 'nullable',
            'profile_picture' => 'nullable|mimes:png,jpeg,bmp'
        ];
    }

    public function handleRequest()
    {
        $allRequestData = $this->validated();
        if ($this->hasFile('profile_picture')) {
            $picture = $this->profile_picture;
            // Now we have A $picture Of File "UploadedFile" 
            $pre_fileName = "profile-picture-";
            $mid_fileName = $this->user()->id;
            $extension_fileName = $picture->getClientOriginalExtension();
            $fileName = $pre_fileName . $mid_fileName . "." . $extension_fileName;
            $fileName = Storage::putFileAs('uploads', $picture, $fileName);
            // 
            /*
            Instead of Using the Storage Facade We Can Use 
            $picture->store()
            OR 
            $picture->storeAs()
            */
            // $fileName Contains the Path To the File in the Storage , Path and Name 
            // $picture->move(public_path('uploads'), $fileName);
            $allRequestData['profile_picture'] = $fileName;
        }
        return $allRequestData;
    }
}
