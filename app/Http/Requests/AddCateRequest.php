<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCateRequest extends FormRequest
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
            'category_product_name' => 'unique:tbl_category_product,category_name' 
        ];
    }
    public function messages()
    {
        return [
            //
            'category_product_name.unique' => 'Tên danh mục đã tồn tại' ,
        ];
    }
}
