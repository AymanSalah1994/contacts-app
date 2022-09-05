<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

    public function handleRequest() {
        $allRequestData = $this->validated();
        if ($this->hasFile('profile_picture')) {
            $picture = $this->profile_picture;
            $pre_fileName = "profile-picture-";
            $mid_fileName = $this->user()->id;
            $extension_fileName = $picture->getClientOriginalExtension();
            $fileName = $pre_fileName . $mid_fileName . "." . $extension_fileName;
            $picture->move(public_path('uploads'), $fileName);
            $allRequestData['profile_picture'] = $fileName;
        }
        return $allRequestData ; 
    }
}
