<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\RequirementModel;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    public function __construct(){
        $active = "active";
        view()->share('activeRequirement', $active);
    }

    //Danh sách những yêu cầu
    public function index()
    {
        $data = RequirementModel::orderBy('id', 'DESC')->paginate(10);

        return view('backend.requirements.list',[
            'data' => $data,
        ]);
    }

    public function update($id)
    {
        $data = RequirementModel::find($id);

        $data->requirement_active = 2;

        if ($data->save()) return redirect()->back()->with('msgSuccess', 'Sửa Trạng Thái Thành Công');

        return redirect()->back()->with('msgError', 'Sửa Trạng Thái Thất Bại');
    }

    public function destroy($id)
    {
        $data = RequirementModel::find($id);

        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa lời nhắn thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa lời nhắn thất bại']);
        }
    }
}
