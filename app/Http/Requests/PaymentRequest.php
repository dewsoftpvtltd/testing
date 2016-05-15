<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaymentRequest extends Request
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account' => 'required|max:255',
            'date'=>'required'
        ];
    }
     public function messages()
    {
        return [
            'account.required' => 'A valid Bank Account No. must be provided.',
            'date.required' => 'The Date of Deposit must be provided.',
        ];
    }
}
