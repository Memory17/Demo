<?php

namespace App\Http\Requests\Admin\Categorys;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => 'required|max:50|min:10',
            'category_keyword' => 'required',
            'category_description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Tên loại sản phẩm không được để trống',
            'category_name.max' => 'Tên loại sản phẩm không được ngắn hơn 10 kí tự và không được dài hơn 50 kí tự',
            'category_name.min' => 'Tên loại sản phẩm không được ngắn hơn 10 kí tự và không được dài hơn 50 kí tự',
            'category_keyword.required' => 'Từ khóa loại sản phẩm không được để trống',
            'category_description.required' => 'Mô tả loại sản phẩm không được để trống',
        ];
    }
}
