<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Helpers\OrderStatus;
use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\OrderdetailModel;
use App\Models\UserModel;
use App\Models\OrderstatusModel;
use App\Models\ProductModel;
use App\Models\Ship\CityModel;

class OrderController extends Controller
{
    public function __construct(){
        $active = "active";
        view()->share('activeOrder', $active);
    }

    //Danh sách hóa đơn
    public function index(){
        $data = OrderModel::orderBy('order_id', 'DESC')->paginate(10);

        return view('backend.orders.list', ['data' => $data]);
    }

    //Xem hóa đơn chi tiết
    public function show($id){
        $dataOrder = OrderModel::find($id);
        $dataOrderdetail = OrderdetailModel::where('order_id', $id)->get();
        return view('backend.orders.show', [    
            'dataOrder' => $dataOrder,
            'dataOrderdetail' => $dataOrderdetail,
        ]);
    }
    
    //Cập nhật trạng thái
    public function update(Request $request, $id){
        $data = OrderModel::find($id);

        $data->order_status = $request->order_status;

        if($data->save()){
            return redirect()->back()->with('msgSuccess', 'Thay đổi trạng thái đơn hàng thành công');
        }
    }

    //Xóa hóa đơn
    public function destroy($id){
        $data = OrderModel::find($id);
        $dataOrderdetail = OrderdetailModel::where('order_id', $id)->get();
        foreach($dataOrderdetail as $item){
            $item->delete();
        }
        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa hóa đơn thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa sản đơn thất bại']);
        }
    }
}
