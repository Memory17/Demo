<?php
namespace App\Traits;

use App\Models\ProductModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait
{
    //Xử lý upload 1 ảnh 
    public function handleUploadImage($request, $fieldName, $foderName)
    {
        //Kiểm tra có request fieldName có tồn tại không
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            //Tạo tên ảnh mới
            $imageName = Str::random(10) . "_" . $image->getClientOriginalName();

            //Upload ảnh vào store với path public/' . $foderName, $imageName
            $path = $request->file($fieldName)->storeAs('public/' . $foderName, $imageName);

            $dataPath = Storage::url($path);

            return $dataPath;
        }
        return null;
    }

    // Xử lý upload nhiều ảnh
    public function handleUploadImageProduct($request, $fieldName, $foderName)
    {
        $dataPath = [];
        if ($request->hasFile($fieldName)) {
            foreach ($request->$fieldName as $item) {
                $imageName = Str::random(10) . "_" . $item->getClientOriginalName();
                $path = $item->storeAs('public/' . $foderName, $imageName);

                $dataPath[$imageName] = Storage::url($path);
            }
        }
        return $dataPath;
    }
}