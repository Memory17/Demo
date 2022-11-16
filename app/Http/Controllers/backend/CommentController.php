<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UseModel;
use App\Models\CommentModel;

class CommentController extends Controller
{
    public function __construct(){
        $active = "active";
        view()->share('activeComment', $active);
    }


    //Danh sách bình luận
    public function index(){
        $data = CommentModel::orderBy('comment_id', 'DESC')->paginate(10);

        return view('backend.comments.list', ['data' => $data]);
    }


    //Xem bình luận
    public function show($id){
        $data = CommentModel::find($id);
        return view('backend.comments.show', ['data' => $data]);
    }


    //Trả lời bình luận từ admin
    public function update(Request $request, $id){
        $data = CommentModel::find($id);

        $data->comment_admin = $request->comment_admin;
        $data->comment_status = 2;

        if($data->save()){
            return redirect()->back()->with('msgSuccess', 'Trả lời bình luận thành công');
        }
    }

    //Hiển thị bình luận tốt ra giao diện trang chủ
    public function slideOn(Request $request, $id){
        $data = CommentModel::find($id);

        $data->comment_status = 3;

        if($data->save()){
            return redirect()->back()->with('msgSuccess', 'Đã để comment hiển thị');
        }
    }


    //Tắt hiển thị comment ở giao diện trang chủ
    public function slideOff(Request $request, $id){
        $data = CommentModel::find($id);

        $data->comment_status = 4;

        if($data->save()){
            return redirect()->back()->with('msgSuccess', 'Đã tắt comment hiển thị');
        }
    }


    //Xóa bình luận
    public function destroy($id){
        $data = CommentModel::find($id);

        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa bình luận thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa bình luận thất bại']);
        }
    }
}
