<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ships\ShipRequest;
use Illuminate\Http\Request;
use App\Models\Ship\CityModel;
use App\Models\Ship\DistrictModel;
use App\Models\Ship\ShipModel;

class ShipController extends Controller
{
    public function __construct(){
        $active = "active";
        view()->share('activeShip', $active);
    }

    //Danh sách phí vận chuyển
    public function index(){
        $data = ShipModel::orderBy('ship_id', 'DESC')->get();

        return view('backend.ships.list', ['data' => $data]);
    }

    //Form tạo phí vận chuyển
    public function create(){
        $dataCity = CityModel::all();
        return view('backend.ships.add', ['dataCity' => $dataCity]);
    }

    //Get data quận huyện
    public function getDataDistricts(Request $request){//json trả về hiển thị quận/huyện
        $city_id = $request->city_id;

        $output = '';
        $dataDistricts = DistrictModel::where('city_id', $city_id)->orderBy('district_id', 'ASC')->get();
        $output .= '<option value="">---Chọn---</option>';

        foreach($dataDistricts as $dataDistrict){
            $output .= '<option value="'. $dataDistrict->district_id .'">'. $dataDistrict->district_name .'</option>';
        };

        echo $output;
    }

    //Thêm phí vận chuyển
    public function store(ShipRequest $request){
        $data = new ShipModel;
        $data->city_id = $request->city_id;
        $data->district_id = $request->district_id;
        $data->ship_price = $request->ship_price;

        if($data->save()){
            return response()->json(['msgSuccess'=>'Tạo phí vận chuyển thành công']);
        }
        else{
            return response()->json(['msgError'=>'Tạo phí vận chuyển thất bại']);
        }
    }

    //Form sửa phí vận chuyển
    public function edit($id){
        $data = ShipModel::find($id);

        return view('backend.ships.update', ['data' => $data]);
    }

    //SỬA phí vận chuyển
    public function update(ShipRequest $request, $id){
        $data = ShipModel::find($id);

        $data->ship_price = $request->ship_price;

        if($data->save()){
            return redirect('admin/ships')->with(['msgSuccess'=>'Sửa phí vận chuyển thành công']);
        }
        else{
            return redirect('admin/ships')->with(['msgError'=>'Sửa phí vận chuyển thất bại']);
        }
    }

    //Xóa phí vận chuyển
    public function destroy($id){
        $data = ShipModel::find($id);

        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa thất bại']);
        }
    }
}
