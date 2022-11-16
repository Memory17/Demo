<?php

namespace App\Http\Requests\Admin\Posts;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'post_title' => 'required|min:5|max:200',
            'post_content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'post_title.required' => 'Tiêu đề bài viết không được để trống',
            'post_title.min' => 'Tiêu đề bài viết không được ngắn hơn 5 kí tự và dài không quá 200 kí tự',
            'post_title.max' => 'Tiêu đề bài viết không được ngắn hơn 5 kí tự và dài không quá 200 kí tự',
            'post_content.required' => 'Nội dung bài viết không được để trống',
        ];
    }
}
