<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'order_name' => 'required|min:5|max:50',
            'order_email' => 'required|email:rfc,dns|max:30',
            'order_phone' => 'required|min:10|max:10',
            'order_addres' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'order_name.required' => 'Họ tên không được để trống',
            'order_name.min' => 'Họ tên quá ngắn phải lớn hơn 5 kí tự',
            'order_name.max' => 'Họ tên quá dài phải nhỏ hơn 50 kí tự',
            'order_email.required' => 'Email không được để trống',
            'order_email.email' => 'Email không đúng định dạng',
            'order_email.max' => 'Email quá dài',
            'order_phone.required' => 'Số điện thoại không được để trống',
            'order_phone.min' => 'Số điện thoại không đúng định dạng',
            'order_phone.max' => 'Số điện thoại không đúng định dạng',
            'order_addres.required' => 'Địa chỉ không được để trống',
            'city_id.required' => 'Địa chỉ không được để trống',
            'district_id.required' => 'Địa chỉ không được để trống',
        ];
    }
}
