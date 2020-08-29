<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            //
            'user_email' => 'unique:users,email',
            'user_phone' => 'unique:users,phone|required|digits:10|numeric',
        ];
    }
    public function messages()
    {
        return [
            //
            'user_email.unique' => 'Email đã tồn tại',
        ];
    }
}
