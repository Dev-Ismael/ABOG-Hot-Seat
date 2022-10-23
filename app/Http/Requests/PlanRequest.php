<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class PlanRequest extends FormRequest
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

            'title'         => ['required' , 'string' , 'max:100' , Rule::unique('plans', 'title')->ignore($this->plan)],
            'old_price'     => ['required' , 'numeric' , 'digits_between:1,6' ],
            'price'         => ['required' , 'numeric' , 'digits_between:1,6' ],
            'recommended'   => ['required' , 'string' , 'max:1'],
            'content'       => ['required' , 'string' ],

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
