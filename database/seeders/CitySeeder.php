<?php

namespace Database\Seeders;

use App\Models\Ship\CityModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CityModel::insert(
            ['city_id' => 1, 'city_name' => 'Thành phố Hà Nội', 'city_type' => 'Thành phố Trung ương'],
            ['city_id' => 2, 'city_name' => 'Tỉnh Hà Giang', 'city_type' => 'Tỉnh'],
            ['city_id' => 4, 'city_name' => 'Tỉnh Cao Bằng', 'city_type' =>'Tỉnh'],
            ['city_id' => 6, 'city_name' => 'Tỉnh Bắc Kạn',  'city_type' => 'Tỉnh'],
            ['city_id' => 8, 'city_name' => 'Tỉnh Tuyên Quang',  'city_type' => 'Tỉnh'],
            ['city_id' => 10, 'city_name' => 'Tỉnh Lào Cai',  'city_type' => 'Tỉnh'],
            ['city_id' => 11, 'city_name' => 'Tỉnh Điện Biên',  'city_type' => 'Tỉnh'],
            ['city_id' => 12, 'city_name' => 'Tỉnh Lai Châu',  'city_type' => 'Tỉnh'],
            ['city_id' => 14, 'city_name' => 'Tỉnh Sơn La',  'city_type' => 'Tỉnh'],
            ['city_id' => 15, 'city_name' => 'Tỉnh Yên Bái',  'city_type' => 'Tỉnh'],
            ['city_id' => 17, 'city_name' => 'Tỉnh Hoà Bình',  'city_type' => 'Tỉnh'],
            ['city_id' => 19, 'city_name' => 'Tỉnh Thái Nguyên',  'city_type' => 'Tỉnh'],
            ['city_id' => 20, 'city_name' => 'Tỉnh Lạng Sơn',  'city_type' => 'Tỉnh'],
            ['city_id' => 22, 'city_name' => 'Tỉnh Quảng Ninh',  'city_type' => 'Tỉnh'],
            ['city_id' => 24, 'city_name' => 'Tỉnh Bắc Giang',  'city_type' => 'Tỉnh'],
            ['city_id' => 25, 'city_name' => 'Tỉnh Phú Thọ',  'city_type' => 'Tỉnh'],
            ['city_id' => 26, 'city_name' => 'Tỉnh Vĩnh Phúc',  'city_type' => 'Tỉnh'],
            ['city_id' => 27, 'city_name' => 'Tỉnh Bắc Ninh',  'city_type' => 'Tỉnh'],
            ['city_id' => 30, 'city_name' => 'Tỉnh Hải Dương',  'city_type' => 'Tỉnh'],
            ['city_id' => 31, 'city_name' => 'Thành phố Hải Phòng',  'city_type' => 'Thành phố Trung ương'],
            ['city_id' => 33, 'city_name' => 'Tỉnh Hưng Yên',  'city_type' => 'Tỉnh'],
            ['city_id' => 34, 'city_name' => 'Tỉnh Thái Bình',  'city_type' => 'Tỉnh'],
            ['city_id' => 35, 'city_name' => 'Tỉnh Hà Nam',  'city_type' => 'Tỉnh'],
            ['city_id' => 36, 'city_name' => 'Tỉnh Nam Định',  'city_type' => 'Tỉnh'],
            ['city_id' => 37, 'city_name' => 'Tỉnh Ninh Bình',  'city_type' => 'Tỉnh'],
            ['city_id' => 38, 'city_name' => 'Tỉnh Thanh Hóa',  'city_type' => 'Tỉnh'],
            ['city_id' => 40, 'city_name' => 'Tỉnh Nghệ An',  'city_type' => 'Tỉnh'],
            ['city_id' => 42, 'city_name' => 'Tỉnh Hà Tĩnh',  'city_type' => 'Tỉnh'],
            ['city_id' => 44, 'city_name' => 'Tỉnh Quảng Bình',  'city_type' => 'Tỉnh'],
            ['city_id' => 45, 'city_name' => 'Tỉnh Quảng Trị',  'city_type' => 'Tỉnh'],
            ['city_id' => 46, 'city_name' => 'Tỉnh Thừa Thiên Huế',  'city_type' => 'Tỉnh'],
            ['city_id' => 48, 'city_name' => 'Thành phố Đà Nẵng',  'city_type' => 'Thành phố Trung ương'],
            ['city_id' => 49, 'city_name' => 'Tỉnh Quảng Nam',  'city_type' => 'Tỉnh'],
            ['city_id' => 51, 'city_name' => 'Tỉnh Quảng Ngãi',  'city_type' => 'Tỉnh'],
            ['city_id' => 52, 'city_name' => 'Tỉnh Bình Định',  'city_type' => 'Tỉnh'],
            ['city_id' => 54, 'city_name' => 'Tỉnh Phú Yên',  'city_type' => 'Tỉnh'],
            ['city_id' => 56, 'city_name' => 'Tỉnh Khánh Hòa',  'city_type' => 'Tỉnh'],
            ['city_id' => 58, 'city_name' => 'Tỉnh Ninh Thuận',  'city_type' => 'Tỉnh'],
            ['city_id' => 60, 'city_name' => 'Tỉnh Bình Thuận',  'city_type' => 'Tỉnh'],
            ['city_id' => 62, 'city_name' => 'Tỉnh Kon Tum',  'city_type' => 'Tỉnh'],
            ['city_id' => 64, 'city_name' => 'Tỉnh Gia Lai',  'city_type' => 'Tỉnh'],
            ['city_id' => 66, 'city_name' => 'Tỉnh Đắk Lắk',  'city_type' => 'Tỉnh'],
            ['city_id' => 67, 'city_name' => 'Tỉnh Đắk Nông',  'city_type' => 'Tỉnh'],
            ['city_id' => 68, 'city_name' => 'Tỉnh Lâm Đồng',  'city_type' => 'Tỉnh'],
            ['city_id' => 70, 'city_name' => 'Tỉnh Bình Phước',  'city_type' => 'Tỉnh'],
            ['city_id' => 72, 'city_name' => 'Tỉnh Tây Ninh',  'city_type' => 'Tỉnh'],
            ['city_id' => 74, 'city_name' => 'Tỉnh Bình Dương',  'city_type' => 'Tỉnh'],
            ['city_id' => 75, 'city_name' => 'Tỉnh Đồng Nai',  'city_type' => 'Tỉnh'],
            ['city_id' => 77, 'city_name' => 'Tỉnh Bà Rịa - Vũng Tàu',  'city_type' => 'Tỉnh'],
            ['city_id' => 79, 'city_name' => 'Thành phố Hồ Chí Minh',  'city_type' => 'Thành phố Trung ương'],
            ['city_id' => 80, 'city_name' => 'Tỉnh Long An',  'city_type' => 'Tỉnh'],
            ['city_id' => 82, 'city_name' => 'Tỉnh Tiền Giang',  'city_type' => 'Tỉnh'],
            ['city_id' => 83, 'city_name' => 'Tỉnh Bến Tre',  'city_type' => 'Tỉnh'],
            ['city_id' => 84, 'city_name' => 'Tỉnh Trà Vinh',  'city_type' => 'Tỉnh'],
            ['city_id' => 86, 'city_name' => 'Tỉnh Vĩnh Long',  'city_type' => 'Tỉnh'],
            ['city_id' => 87, 'city_name' => 'Tỉnh Đồng Tháp',  'city_type' => 'Tỉnh'],
            ['city_id' => 89, 'city_name' => 'Tỉnh An Giang',  'city_type' => 'Tỉnh'],
            ['city_id' => 91, 'city_name' => 'Tỉnh Kiên Giang',  'city_type' => 'Tỉnh'],
            ['city_id' => 92, 'city_name' => 'Thành phố Cần Thơ',  'city_type' => 'Thành phố Trung ương'],
            ['city_id' => 93, 'city_name' => 'Tỉnh Hậu Giang',  'city_type' => 'Tỉnh'],
            ['city_id' => 94, 'city_name' => 'Tỉnh Sóc Trăng',  'city_type' => 'Tỉnh'],
            ['city_id' => 95, 'city_name' => 'Tỉnh Bạc Liêu',  'city_type' => 'Tỉnh'],
            ['city_id' => 96, 'city_name' => 'Tỉnh Cà Mau',  'city_type' => 'Tỉnh']
        );
    }
}
