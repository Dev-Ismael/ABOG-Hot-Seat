<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateSettingRequest extends FormRequest
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
            'address'           => ['nullable' , 'string' , 'max:255' ],
            'location'          => ['nullable' , 'string' , 'max:255' ],
            'footer_content'    => ['nullable' , 'string' , 'max:500' ],
            'email'             => ['nullable' , 'email' , 'max:255' ],
            'phone'             => ['nullable' , 'string' , 'max:255' ],
            'phone_formatted'   => ['nullable' , 'string' , 'max:255' ],
            'instagram'         => ['nullable' , 'string' , 'max:255' ],
            'facebook'          => ['nullable' , 'string' , 'max:255' ],
            'twitter'           => ['nullable' , 'string' , 'max:255' ],
            'linkedin'          => ['nullable' , 'string' , 'max:255' ],
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
