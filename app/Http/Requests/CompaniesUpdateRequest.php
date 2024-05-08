<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CompaniesUpdateRequest extends FormRequest
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
            'companyName' => 'sometimes|max:128',
            'companyRegistrationNumber' => 'sometimes|max:16',
            'companyFoundationDate' => 'missing',
            'country' => 'sometimes|max:64',
            'zipCode' => 'sometimes|max:64',
            'city' => 'sometimes|max:64',
            'streetAddress' => 'sometimes|max:128',
            'latitude' => 'sometimes|numeric|between:-90,90',
            'longitude' => 'sometimes|numeric|between:-180,180',
            'companyOwner' => 'sometimes|max:64',
            'employees' => 'sometimes|integer|lt:65535',
            'activity' => 'sometimes|max:32',
            'active' => 'sometimes|max:5',
            'email' => 'sometimes|max:64',
            'password' => 'sometimes|max:64'
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
