<?php

namespace App\Http\Requests\Users;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

/**
 * Class CreateUserRequest
 * @package App\Http\Requests\Users
 * @property string $name
 * @property string $email
 * @property string $password
 */
class CreateUserRequest extends FormRequest
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
            'name' => 'required|alpha_num',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
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
            /* name */
            'name.required' => 'The :attribute field is required.',
            'name.alpha_num' => 'The :attribute can only be alphabets and numbers.',

            /* email */
            'email.required' => 'The :attribute field is required.',
            'email.email' => 'The :attribute should be an valid email.',
            'email.unique' => 'The :attribute is already been taken.',

            /* password */
            'password.required' => 'The :attribute field is required.',
            'password.min' => 'The :attribute should be longer or equal to :min.'
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'error' => $validator->errors()
        ], Response::HTTP_BAD_REQUEST));
    }
}
