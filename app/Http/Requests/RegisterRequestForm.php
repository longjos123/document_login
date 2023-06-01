<?php

namespace App\Http\Requests;

use App\Constants\UserConstant;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequestForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            UserConstant::INPUT_NAME => 'required',
            UserConstant::INPUT_EMAIL => 'required|unique:users,email|email',
            UserConstant::INPUT_PHONE => 'required|digits:10',
            UserConstant::INPUT_PASSWORD => 'required|between:4,12|confirmed',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            UserConstant::INPUT_NAME . '.' . 'required' => __('validation.required'),
            UserConstant::INPUT_EMAIL . '.' . 'required' => __('validation.required'),
            UserConstant::INPUT_EMAIL . '.' . 'unique' => __('validation.unique'),
            UserConstant::INPUT_EMAIL . '.' . 'email' => __('validation.regex'),
            UserConstant::INPUT_PHONE . '.' . 'required' => __('validation.required'),
            UserConstant::INPUT_PHONE . '.' . 'digits' => __('validation.digits'),
        ];
    }
}
