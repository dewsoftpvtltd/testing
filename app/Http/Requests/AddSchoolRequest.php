<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class AddSchoolRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $u = Auth::user();//dd($u->roles);
        $p = $u->hasPermissionTo('create');//dd($p);
        return $p;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'fname' => 'required|max:255',
        'lname' => 'required',
        'branch'=>'required'
    ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fname.required' => 'A First Name is required',
            'lname.required'  => 'A Last Name is required',
            'branch.required'  => 'A Branch Name is required',
        ];
    }
}
