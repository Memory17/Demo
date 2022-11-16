<?php

namespace App\Http\Requests\Admin\Slides;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'slide_title' => 'required|max:30|min:5',
            'target' => 'required',
            'product_image' => 'required',
            'active' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'slide_title.required' => 'Tiêu đề slide không được để trống',
            'slide_title.max' => 'Tiêu đề slide không được ngắn hơn 5 kí tự và dài hơn 30 kí tự',
            'slide_title.min' => 'Tiêu đề slide không được ngắn hơn 5 kí tự và dài hơn 30 kí tự',
            'target.required' => 'Target không được để trống',
            'active.required' => 'Trạng thái slide không được để trống',
            'product_image.required' => 'Hình ảnh slide không được để trống',
        ];
    }
}
