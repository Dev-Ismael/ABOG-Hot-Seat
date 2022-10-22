<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdatePlanRequest extends FormRequest
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

            // Standard
            'standard.price.us.monthly'    => ['required' , 'integer' , 'digits_between:1,10' , 'distinct' ],
            'standard.price.us.yearly'     => ['required' , 'integer' , 'digits_between:1,10' , 'distinct' ],
            'standard.price.eg.monthly'    => ['required' , 'integer' , 'digits_between:1,10' , 'distinct' ],
            'standard.price.eg.yearly'     => ['required' , 'integer' , 'digits_between:1,10' , 'distinct' ],
            'standard.content'             => ['required' , 'string' , 'distinct' ],


            // premium
            'premium.price.us.monthly'    => ['required' , 'integer' , 'digits_between:1,10' , 'distinct' ],
            'premium.price.us.yearly'     => ['required' , 'integer' , 'digits_between:1,10' , 'distinct' ],
            'premium.price.eg.monthly'    => ['required' , 'integer' , 'digits_between:1,10' , 'distinct' ],
            'premium.price.eg.yearly'     => ['required' , 'integer' , 'digits_between:1,10' , 'distinct' ],
            'premium.content'             => ['required' , 'string' , 'distinct' ],


            // unlimited
            'unlimited.price.us.monthly'    => ['required' , 'integer' , 'digits_between:1,10' , 'distinct' ],
            'unlimited.price.us.yearly'     => ['required' , 'integer' , 'digits_between:1,10' , 'distinct' ],
            'unlimited.price.eg.monthly'    => ['required' , 'integer' , 'digits_between:1,10' , 'distinct' ],
            'unlimited.price.eg.yearly'     => ['required' , 'integer' , 'digits_between:1,10' , 'distinct' ],
            'unlimited.content'             => ['required' , 'string' , 'distinct' ],


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
