<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required|min:5|max:50',
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_keyword' => 'required',
            'product_description' => 'required',
            'product_price_buy' => 'required',
            'product_price_sell' => 'required',
            'product_sale' => 'required',
            'product_amount' => 'required',
            'product_detail' => 'required',
            'product_attribute' => 'required',
            'product_image' => 'required',
            'product_list_image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_name.min' => 'Tên sản phẩm không được ngắn hơn 5 kí tự và dài hơn 50 kí tự',
            'product_name.max' => 'Tên sản phẩm không được ngắn hơn 5 kí tự và dài hơn 50 kí tự',
            'category_id.required' => 'Loại sản phẩm không được để trống',
            'brand_id.required' => 'Thương hiệu sản phẩm không được để trống',
            'product_keyword.required' => 'Từ khóa không được để trống',
            'product_description.required' => 'Mô tả không được để trống',
            'product_price_buy.required' => 'Giá nhập không được để trống',
            'product_price_sell.required' => 'Giá bán không được để trống',
            'product_sale.required' => 'Khuyến mãi không được để trống',
            'product_amount.required' => 'Số lượng không được để trống',
            'product_detail.required' => 'Chi tiết không được để trống',
            'product_attribute.required' => 'Thuộc tính không được để trống',
            'product_image.required' => 'Ảnh không được để trống',
            'product_list_image.required' => 'Ảnh khác không được để trống',
        ];
    }
}
