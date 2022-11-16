<?php

namespace App\Http\Requests\Admin\Ships;

use Illuminate\Foundation\Http\FormRequest;

class ShipRequest extends FormRequest
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
            'city_id' => 'required',
            'district_id' => 'required',
            'ship_price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'city.required' => 'Tỉnh/Thành phố không được để trống',
            'district_id.required' => 'Quận/Huyện không được để trống',
            'ship_price.required' => 'Phí vận chuyển không được để trống',
        ];
    }
}
