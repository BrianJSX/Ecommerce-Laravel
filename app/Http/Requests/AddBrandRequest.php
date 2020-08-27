<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBrandRequest extends FormRequest
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
            'brand_product_name' => 'unique:tbl_brand,brand_name' 
        ];
    }
    public function messages()
    {
        return [
            //
            'brand_product_name.unique' => 'Tên Thương Hiệu đã tồn tại' ,
        ];
    }
}
