<?php

namespace App\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CustomerCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'                   => 'required|max:20',
            'lastName'               => 'required|max:30',
            'company'                => 'required',
            'photo'                  => 'required',
            'contactInformation'     => 'required|array',
            'contactInformation.phoneNumber' => 'required',
            'contactInformation.emailAddres' => 'required|email',
            'contactInformation.location' => 'required|array',
            'contactInformation.location.lang' => 'required',
            'contactInformation.location.lat' => 'required',
        ];
    }
    public function failedValidation(Validator $validator)

    {
        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ]));

    }
}
