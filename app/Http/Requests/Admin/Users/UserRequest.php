<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_name' => 'required|min:10|max:50',
            'user_email' => 'required|unique:users,user_email|max:30|email:rfc,dns',
            'user_password' => 'required|min:5|max:20',
            'user_password_again' => 'required|same:user_password',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Họ tên không được để trống',
            'user_name.min' => 'Họ tên phải lớn hơn 5 kí tự',
            'user_name.max' => 'Họ tên phải bé hơn 50 kí tự',
            'user_email.required' => 'Email không được để trống',
            'user_email.unique' => 'Email này đã được sử dụng',
            'user_email.email' => 'Email chưa đúng định dạng',
            'user_email.max' => 'Email phải bé hơn 30 kí tự',
            'user_password.required' => 'Mật khẩu không được để trống',
            'user_password.min' => 'Mật khẩu phải dài hơn 5 kí tự',
            'user_password.max' => 'Mật khẩu không được dài quá 20 kí tự',
            'user_password_again.required' => 'Mật khẩu xác nhận không được để trống',
            'user_password_again.same' => 'Mật khẩu xác nhận không giống',
        ];
    }
}
