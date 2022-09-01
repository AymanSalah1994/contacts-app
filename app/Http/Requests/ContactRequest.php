<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            //
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id'
        ];
    }

    public function attributes()
    {
        return [
            'company_id' => 'Company' , 
            // instead of the Company id is Required , the error Message will be 
            // the Company Field is Required 
            // 'email' => 'email address'
        ] ; 
    }

    public function messages()
    {
        return [
            // field.validation_Rule => 'msg ' 
            'email.email' =>'The Email you Entered is NOT valid!' , 
            '*.required' => 'This :attribute Filed Can Not be Empty !'
        ] ; 
    }
}
