<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'user_email' => 'unique:users,email,'.$this->segment(4).',id',
            'user_phone' => 'unique:users,phone,'.$this->segment(4).',id',
        ];
    }
    public function messages()
    {
        return [
            'user_email.unique' => 'Email đã tồn tại',
            'user_phone.unique' => 'Phone đã tồn tại'
        ];
    }
}
