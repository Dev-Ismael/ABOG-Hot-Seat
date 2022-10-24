<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMessegeRequest extends FormRequest
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
     * @return array<string, mixed>
    */
    public function rules()
    {
        return [
            'name'              => ['required' , 'string' , 'max:100' ],
            'email'             => ['required' , 'email' ,  'max:100' ],
            'phone'             => ['required' , 'string' , 'max:100' ],
            'subject'           => ['required' , 'string' , 'max:100' ],
            'body'              => ['required' , 'string' , 'max:2000' ],
        ];
    }

}
