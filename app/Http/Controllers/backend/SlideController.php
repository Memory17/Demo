<?php

namespace App\Http\Controllers\backend;

use App\Models\SlideModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slides\SlideRequest;
use App\Http\Requests\Admin\Slides\SlideUpdateRequest;
use App\Traits\ImageUploadTrait;

class SlideController extends Controller
{
    use ImageUploadTrait;

    public function __construct(){
        $active = "active";
        view()->share('activeSlide', $active);
    }

    public function index(){
        $data = SlideModel::orderBy('id', 'DESC')->paginate(10);

        return view('backend.slides.list', ['data' => $data]);
    }

    public function create(){
        return view('backend.slides.add');
    }

    public function store(SlideRequest $request){
        $data = new SlideModel;

        $data->image = $this->handleUploadImage($request, 'product_image', 'images_slide');
        $data->slide_title = $request->slide_title;
        $data->target = $request->target;
        $data->type = $request->type;
        $data->active = $request->active;

        if($data->save()){
            return redirect('admin/slides/create')->with('msgSuccess', 'Thêm Slide Thành Công');
        }
        else{
            return redirect('admin/slides/create')->with('msgError', 'Thêm Slide Thất Bại');
        }
    }

    public function edit($id)
    {
        $data = SlideModel::find($id);

        return view('backend.slides.update',['data' => $data]);

    }

    public function update(SlideUpdateRequest $request, $id)
    {
        $data = SlideModel::find($id);
        
        $dataImage = $this->handleUploadImage($request, 'product_image', 'images_slide');

        if ($dataImage != null) {
            $image_path = public_path() . '/' . $data->image;
    
            if (file_exists(public_path('/' . $data->image))) unlink($image_path);

            $data->image = $dataImage;
        }
        $data->slide_title = $request->slide_title;
        $data->target = $request->target;
        $data->type = $request->type;
        $data->active = $request->active;

        $data->save();

        return redirect()->back()->with('msgSuccess', 'Sửa slide thành công');
    }

    public function destroy($id)
    {
        $data = SlideModel::find($id);
        if (file_exists(public_path('/' . $data->image))) unlink(public_path() . '/' . $data->image);

        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa slide thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa slide thất bại']);
        }
    }
}
