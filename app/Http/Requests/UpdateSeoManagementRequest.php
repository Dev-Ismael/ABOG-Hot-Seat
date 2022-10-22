<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateSeoManagementRequest extends FormRequest
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

            // Home
            'home.title'             => ['required' , 'string' , 'distinct' , 'max:100' ],
            'home.keywords'          => ['required' , 'string' , 'distinct' , 'max:500' ],
            'home.description'       => ['required' , 'string' , 'distinct' , 'max:500' ],


            // About
            'about.title'             => ['required' , 'string' , 'distinct' , 'max:100' ],
            'about.keywords'          => ['required' , 'string' , 'distinct' , 'max:500' ],
            'about.description'       => ['required' , 'string' , 'distinct' , 'max:500' ],


            // Contact
            'contact.title'             => ['required' , 'string' , 'distinct' , 'max:100' ],
            'contact.keywords'          => ['required' , 'string' , 'distinct' , 'max:500' ],
            'contact.description'       => ['required' , 'string' , 'distinct' , 'max:500' ],


        ];
    }



    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'msg'    => 'validation failed',
            'errors'  => $validator->errors()
        ], 200));
    }
}
