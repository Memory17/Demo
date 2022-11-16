<?php

namespace App\Http\Controllers\backend;

use App\Models\BrandModel;
use App\Models\ImageModel;
use Illuminate\Support\Str;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\Products\ProductRequest;
use App\Http\Requests\Admin\Products\ProductUpdateRequest;

class ProductController extends Controller
{
    use ImageUploadTrait;

    public function __construct(){
        $active = "active";
        view()->share('activeProduct', $active);
    }
    
    //Danh sách sản phẩm
    public function index()
    {
        $data = ProductModel::orderBy('product_id', 'DESC')->paginate(6);

        return view('backend.products.list', ['data' => $data]);
    }

    //Form thêm sản phẩm
    public function create()
    {
        $dataCategory = CategoryModel::all();
        $dataBrand = BrandModel::all();

        return view('backend.products.add',['dataCategory' => $dataCategory, 'dataBrand' => $dataBrand]);
    }

    //Thêm sản phẩm
    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = new ProductModel();
        
            $data->product_image = $this->handleUploadImage($request, 'product_image', 'images_product');
            $data->product_name = $request->product_name;
            $data->category_id = $request->category_id;
            $data->brand_id = $request->brand_id;
            $data->product_price_buy = $request->product_price_buy;
            $data->product_price_sell = $request->product_price_sell;
            $data->product_amount = $request->product_amount;
            $data->product_sale = $request->product_sale;
            $data->product_attribute = $request->product_attribute;
            $data->product_detail = $request->product_detail;
            $data->product_keyword = $request->product_keyword;
            $data->product_description = $request->product_description;

            $data->save();
            $id_product_insert = $data->product_id;

            $dataPath = $this->handleUploadImageProduct($request, 'product_list_image', 'images_product');
            if ($dataPath != null) {
                foreach ($dataPath as $key => $path) {
                    $dataImages = new ImageModel();

                    $dataImages->image_name = $path;
                    $dataImages->product_id = $id_product_insert;
                    $dataImages->save();
                }
            }
            DB::commit();
            return redirect('admin/products/create')->with('msgSuccess', 'Thêm sản phẩm thành công');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect('admin/products/create')->with('msgSuccess', 'Thêm sản phẩm thất bại');
        }
    }

    //Xem chi tiết sản phẩm
    public function show($id)
    {
        $data = ProductModel::find($id);
        $dataImage = ImageModel::where('product_id', $id)->get();

        return view('backend.products.show', ['data' => $data, 'images' => $dataImage]);
    }

    //Form cập nhật sản phẩm
    public function edit($id)
    {
        $dataCategory = CategoryModel::all();
        $dataBrand = BrandModel::all();
        $data = ProductModel::find($id);
        $dataImage = ImageModel::where('product_id', $id)->get();

        return view('backend.products.update',['data' => $data, 'dataCategory' => $dataCategory, 'dataBrand' => $dataBrand, 'dataImage' => $dataImage]);

    }

    //Cập nhật sản phẩm
    public function update(ProductUpdateRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $data = ProductModel::find($id);
        
            $dataPathImage = $this->handleUploadImage($request, 'product_image', 'images_product');
    
            if ($dataPathImage != null) {
                $image_path = public_path() . '/' . $data->product_image;
    
                if (file_exists(public_path('/' . $data->product_image))) unlink($image_path);
    
                $data->product_image = $dataPathImage;
            }
    
            $data->product_name = $request->product_name;
            $data->category_id = $request->category_id;
            $data->brand_id = $request->brand_id;
            $data->product_price_buy = $request->product_price_buy;
            $data->product_price_sell = $request->product_price_sell;
            $data->product_amount = $request->product_amount;
            $data->product_sale = $request->product_sale;
            $data->product_attribute = $request->product_attribute;
            $data->product_detail = $request->product_detail;
            $data->product_keyword = $request->product_keyword;
            $data->product_description = $request->product_description;
    
            $data->save();
            
            $dataPath = $this->handleUploadImageProduct($request, 'product_list_image', 'images_product');
            if ($dataPath != null) {
                $dataImgs = ImageModel::where('product_id', $id)->get();
                
                foreach ($dataImgs as $image) {
                    $image_path = public_path() . '/' . $image->image_name;
                    if (file_exists(public_path('/' . $image->image_name))) unlink($image_path);
                    $image->delete();
                }
                foreach ($dataPath as $key => $path) {
                    $dataImages = new ImageModel();
                    
                    $dataImages->image_name = $path;
                    $dataImages->product_id = $id;
                    $dataImages->save();
                }
            }
            DB::commit();
            return redirect()->back()->with('msgSuccess', 'Sửa sản phẩm thành công');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('msgSuccess', 'Sửa sản phẩm thất bại');
        }
    }

    //Xóa sản phẩm
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $data = ProductModel::find($id);
            if (file_exists(public_path('/' . $data->product_image))) unlink(public_path() .'/'. $data->product_image);
            $dataImages = ImageModel::where('product_id', $id)->get();
            foreach($dataImages as $image){
                $dataImage = ImageModel::find($image->image_id);
                if (file_exists(public_path('/' . $dataImage->image_name))) unlink(public_path() .'/'.$dataImage->image_name);
                $dataImage->delete();
            }
            $data->delete();
            DB::commit();
            return response()->json(['msgSuccess'=>'Xóa sản phẩm thành công']);
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['msgError'=>'Xóa sản phẩm thất bại']);
        }
    }
}
