<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPermissionRequest extends FormRequest
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
            'permission_name' => 'unique:permissions,name'.$this->segment(6).',id',
        ];
    }
    public function messages()
    {
        return [
            'permission_name.unique' => 'Tên permission đã tồn tại'
        ];

    }
}
