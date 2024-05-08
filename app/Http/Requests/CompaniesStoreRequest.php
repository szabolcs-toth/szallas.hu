<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CompaniesStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'companyName' => 'required|max:128',
            'companyRegistrationNumber' => 'required|max:16',
            'companyFoundationDate' => 'required|date_format:Y-m-d',
            'country' => 'required|max:64',
            'zipCode' => 'required|max:64',
            'city' => 'required|max:64',
            'streetAddress' => 'required|max:128',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'companyOwner' => 'required|max:64',
            'employees' => 'required|integer|lt:65535',
            'activity' => 'required|max:32',
            'active' => 'required|max:5',
            'email' => 'required|max:64',
            'password' => 'required|max:64'
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }

    /**
     * @param Validator $validator
     */
    public function failedValidation(Validator $validator): HttpResponseException
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ], 422));
    }
}
