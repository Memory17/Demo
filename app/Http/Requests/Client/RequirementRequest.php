<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class RequirementRequest extends FormRequest
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
            'name' => 'required|min:5|max:30',
            'email' => 'required|max:50|email:rfc,dns',
            'title' => 'required|max:200',
            'value' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ tên không được để trống',
            'name.min' => 'Họ tên phải lớn hơn 5 kí tự',
            'name.max' => 'Họ tên phải bé hơn 30 kí tự',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email chưa đúng định dạng',
            'email.max' => 'Email phải bé hơn 50 kí tự',
            'title.required' => 'Tiêu đề không được để trống',
            'title.max' => 'tiêu đề quá dài không được quá 200 kí tự',
            'value.required' => 'Nội dung không được để trống',
        ];
    }
}
