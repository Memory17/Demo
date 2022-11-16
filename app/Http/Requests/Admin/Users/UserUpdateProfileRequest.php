<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateProfileRequest extends FormRequest
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
            'user_name' => 'required|min:5|max:50',
            'user_password_old' => 
            ['required',
                function ($attribute, $user_password_old, $fail) {
                    if (!Hash::check($user_password_old, Auth::user()->password)) {
                        $fail('Mật khẩu chưa đúng');
                    }
                },
            ],
            'user_password' => 'required|min:5|max:20|different:user_password_old',
            'user_password_again' => 'required|same:user_password',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Họ tên không được để trống',
            'user_name.min' => 'Họ tên phải lớn hơn 5 kí tự',
            'user_name.max' => 'Họ tên phải bé hơn 50 kí tự',
            'user_password_old.required' => 'Mật khẩu cũ không được để trống',
            'user_password.required' => 'Mật khẩu không được để trống',
            'user_password.min' => 'Mật khẩu phải dài hơn 5 kí tự',
            'user_password.max' => 'Mật khẩu không được dài quá 20 kí tự',
            'user_password.different' => 'Mật khẩu không được trùng mật khẩu cũ',
            'user_password_again.required' => 'Mật khẩu nhập lại không được để trống',
            'user_password_again.same' => 'Mật khẩu nhập lại không Khớp',
        ];
    }
}
