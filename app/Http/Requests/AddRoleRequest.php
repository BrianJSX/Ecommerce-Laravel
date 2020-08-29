<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRoleRequest extends FormRequest
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
            'role_name' => 'unique:roles,name',
            
        ];
    }
    public function messages()
    {
        return [
            //
            'role_name.unique' => 'Tên role đã tồn tại'
        ];
    }
}
