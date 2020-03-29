<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBrandRequest extends FormRequest
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
            'brand_product_name' => 'unique:tbl_brand,brand_name,'.$this->segment(5).',brand_id',
            
        ];
    }
    public function messages()
    {
        return [
            //
            'brand_product_name.unique' => 'Tên thương hiệu đã tồn tại'
        ];
    }
}
