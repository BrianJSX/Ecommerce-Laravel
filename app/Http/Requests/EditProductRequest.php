<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'img' => 'image',
            // 'code' => 'unique:vp_product,prod_code,'.$this->segment(5).',prod_code',
            'name' => 'unique:vp_product,prod_name,'.$this->segment(5).',prod_id', 
           
        ];
    }
    public function messages()
    {
        return [
            'code.unique' => 'Mã sản phẩm đã tồn tại',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            
        ];
    }
}
