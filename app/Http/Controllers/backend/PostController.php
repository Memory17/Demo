<?php

namespace App\Http\Controllers\backend;

use App\Models\PostModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Posts\PostRequest;
use App\Http\Requests\Admin\Posts\PostUpdateRequest;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use ImageUploadTrait;
    
    public function __construct(){
        $active = "active";
        view()->share('activePost', $active);
    }

    //Danh sách bài posts
    public function index()
    {
        $data = PostModel::orderBy('id', 'DESC')->paginate(10);

        return view('backend.posts.list', [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('backend.posts.add');
    }

    public function store(PostRequest $request)
    {
        $data = new PostModel();

        $data->post_image = $this->handleUploadImage($request, 'product_image', 'images_blog');
        $data->user_id = Auth::id();
        $data->post_title = $request->post_title;
        $data->post_content = $request->post_content;
        
        if ($data->save()) return redirect()->back()->with('msgSuccess', 'Thêm bài viết thành công');

        return redirect()->back()->with('msgError', 'Thêm bài viết thất bại');
    }

    public function edit($id)
    {
        $data = PostModel::find($id);

        return view('backend.posts.update', [
            'data' => $data,
        ]);
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $data = PostModel::find($id);
        $dataImage = $this->handleUploadImage($request, 'product_image', 'images_blog');

        if ($dataImage != null) {
            $image_path = public_path() . '/' . $data->post_image;
    
            if (file_exists(public_path('/' . $data->post_image))) unlink($image_path);

            $data->post_image = $dataImage;
        }

        $data->user_id = Auth::id();
        $data->post_title = $request->post_title;
        $data->post_content = $request->post_content;
        
        if ($data->save()) return redirect()->back()->with('msgSuccess', 'Sửa bài viết thành công');

        return redirect()->back()->with('msgError', 'Sửa bài viết thất bại');
    }

    public function destroy($id)
    {
        $data = PostModel::find($id);
        if (file_exists(public_path('/' . $data->post_image))) unlink(public_path() . '/' . $data->post_image);

        if($data->delete()){
            return response()->json(['msgSuccess'=>'Xóa bài viết thành công']);
        }
        else{
            return response()->json(['msgError'=>'Xóa bài viết thất bại']);
        }
    }
}
