<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categorys\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\CategoryModel;

class CategoryController extends Controller
{

    public function __construct(){
        $active = "active";
        view()->share('activeCategory', $active);
    }

    //Hiển thị danh sách category
    public function index(){
        $data = CategoryModel::orderBy('category_id', 'DESC')->paginate(5);

        return view('backend.categorys.list', ['data' => $data]);
    }


    //Hiển thị form thêm mới category
    public function create(){
        return view('backend.categorys.add');
    }

    public function store(CategoryRequest $request){
        $data = new CategoryModel();

        $data->category_name = $request->category_name;
        $data->category_keyword = $request->category_keyword;
        $data->category_description = $request->category_description;

        if($data->save()){
            return redirect('admin/categorys/create')->with('msgSuccess', 'Thêm Loại Sản Phẩm Thành Công');
        }
        else{
            return redirect('admin/categorys/create')->with('msgError', 'Thêm Loại Sản Phẩm Thất Bại');
        }

    }

    //Hiển thị form sửa category
    public function edit($id){
        $data = CategoryModel::find($id);

        return view('backend.categorys.update', ['data' => $data]);
    }

    public function update(CategoryRequest $request, $id){
        $data = CategoryModel::find($id);
        
        $data->category_name = $request->category_name;
        $data->category_keyword = $request->category_keyword;
        $data->category_description = $request->category_description;

        if($data->save()){
            return redirect()->back()->with('msgSuccess', 'Cập Nhật Loại Sản Phẩm Thành Công');
        }
        else{
            return redirect()->back()->with('msgSuccess', 'Cập Nhật Loại Sản Phẩm Thất Bại');
        }
    }

    public function destroy($id){
        $data = CategoryModel::find($id);

        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa Loại sản phẩm thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa Loại sản phẩm thất bại']);
        }
    }
}
