<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Coupons\CouponRequest;
use Illuminate\Http\Request;
use App\Models\CouponModel;

class CouponController extends Controller
{
    public function __construct(){
        $active = "active";
        view()->share('activeCoupon', $active);
    }

    //Danh sách mã giảm giá
    public function index(){
        $data = CouponModel::orderBy('coupon_id', 'DESC')->paginate(10);

        return view('backend.coupons.list', ['data' => $data]);
    }

    //Form tạo mã giảm giá
    public function create(){
        return view('backend.coupons.add');
    }

    //Thêm mã giảm giá
    public function store(CouponRequest $request){
        $data = new CouponModel;

        $data->coupon_name = $request->coupon_name;
        $data->coupon_code = $request->coupon_code;
        $data->coupon_value = $request->coupon_value;
        $data->coupon_status = $request->coupon_status;
        $data->coupon_expiry = $request->coupon_expiry;

        if($data->save()){
            return redirect('admin/coupons/create')->with('msgSuccess', 'Thêm Mã Giảm Giá Thành Công');
        }
        else{
            return redirect('admin/coupons/create')->with('msgError', 'Thêm Mã Giảm Giá Thất Bại');
        }
    }


    //Form sửa mã giảm giá
    public function edit($id){
        $data = CouponModel::find($id);

        return view('backend.coupons.update', ['data' => $data]);
    }

    //Cập nhật mã giảm giá
    public function update(CouponRequest $request, $id){
        $data = CouponModel::find($id);

        $data->coupon_name = $request->coupon_name;
        $data->coupon_code = $request->coupon_code;
        $data->coupon_value = $request->coupon_value;
        $data->coupon_status = $request->coupon_status;
        $data->coupon_expiry = $request->coupon_expiry;

        if($data->save()){
            return redirect()->back()->with('msgSuccess', 'Sửa Mã Giảm Giá Thành Công');
        }
        else{
            return redirect()->back()->with('msgError', 'Sửa Mã Giảm Giá Thất Bại');
        }
    }

    //Xóa mã giảm giá
    public function destroy($id){
        $data = CouponModel::find($id);

        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa mã giảm giá thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa mã giảm giá thất bại']);
        }
    }
}
