@extends('backend.layout')

@section('content')
<div class="content">
  @include('backend.note')
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Thêm sản phẩm</h4>
            </div>
            <div class="card-body">
              <form action="admin/products/{{$data->product_id}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tên Sản Phẩm</label>
                      <input type="text" name="product_name" value="{{$data->product_name}}" class="form-control">
                      @error('product_name')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Từ khóa</label>
                        <input type="text" name="product_keyword" value="{{$data->product_keyword}}" class="form-control">
                        @error('product_keyword')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Mô tả</label>
                        <input type="text" name="product_description" value="{{$data->product_description}}" class="form-control">
                        @error('product_description')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Giá Nhập</label>
                        <input type="number" name="product_price_buy" value="{{$data->product_price_buy}}" class="form-control">
                        @error('product_price_buy')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Giá Bán</label>
                        <input type="number" name="product_price_sell" value="{{$data->product_price_sell}}" class="form-control">
                        @error('product_price_sell')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Khuyễn Mãi</label>
                      <input type="number" name="product_sale" value="{{$data->product_sale}}" class="form-control">
                      @error('product_sale')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Số Lượng</label>
                      <input type="number" name="product_amount" value="{{$data->product_amount}}" class="form-control">
                      @error('product_amount')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Loại Sản Phẩm</label>
                      <select name="category_id" class="form-control">
                        <option value="">---Chọn Loại---</option>
                        @foreach ($dataCategory as $item)
                          <option value="{{$item->category_id}}"
                            @if ($item->category_id == $data->category_id)
                                {{'selected'}}
                            @endif
                          >{{$item->category_name}}</option>
                        @endforeach
                      </select>
                      @error('category_id')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Thương Hiệu</label>
                      <select name="brand_id" class="form-control">
                        <option value="">---Chọn Thương Hiệu---</option>
                        @foreach ($dataBrand as $item)
                          <option value="{{$item->brand_id}}"
                            @if ($item->brand_id == $data->brand_id)
                                {{'selected'}}
                            @endif
                          >{{$item->brand_name}}</option>
                        @endforeach
                      </select>
                      @error('brand_id')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
            <div class="row">
              <div class="col-md-12">
                <div class="fom-group">
                  <label class="bmd-label-floating">Hình Ảnh</label>
                  <input type="file" id="product_image" name="product_image" onchange="chosseFile(this)" class="form-control" accept="image/*">
                </div>
                @error('product_image')
                  <span class="text-danger">{{$message}}</span>
                @enderror
                <br>    
                <img src="{{$data->product_image}}" id="image" style="width:200px" alt="Ảnh sản phẩm">
              </div>
            </div>
            <br>
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="fom-group">
                    <label class="bmd-label-floating">Hình Ảnh Khác</label>
                    <input type="file" id="product_list_image" name="product_list_image[]" onchange="chosseFiles(this)" class="form-control" accept="image/*" multiple>
                  </div>
                  @error('product_list_image')
                    <span class="text-danger">{{$message}}</span>
                  @enderror
                </div>
                <div class="col-md-12">
                  <div class="row" id="list_image">
                    {{-- <div class="image-list"> --}}
                      @foreach ($dataImage as $item)
                        <img style="width: 100px;" class="col-md-4 mb-3" src="{{$item->image_name}}">
                      @endforeach
                    {{-- </div> --}}
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Chi tiết</label>
                    <textarea name="product_detail" id="my-editor-1" cols="30" rows="10" class="ckeditor"> {!!$data->product_detail!!}</textarea>
                    @error('product_detail')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Mô tả</label>
                    <textarea name="product_attribute" id="my-editor-2" cols="30" rows="10"  class="ckeditor"> {!!$data->product_attribute!!}</textarea>
                    @error('product_attribute')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Sửa Sản Phẩm</button>
        <a href="/admin/products" class="btn btn-primary pull-right">Danh sách sản phẩm</a>
        <div class="clearfix"></div>
      </div>
    </form>
    </div>
  </div>
@endsection

@section('script')
<script src="..\backend_assets\assets\ckeditor.js"></script>
  <script>
    function chosseFile(file){
        if(file && file.files[0]){
            var reader = new FileReader()
            reader.onload = function(e){
                $("#image").attr('src', e.target.result)
            }
            reader.readAsDataURL(file.files[0])
        }
    }

    function chosseFiles(file){
      var place = $('#list_image');
      
      if(file && file.files.length < 4){
        var count = file.files.length;
        $('.image-list').remove();
        $('#list_image img').remove();
        for(var i = 0; i < count; i++){
          var reader = new FileReader();

          reader.onload = function(event) {
            $($.parseHTML('<img style="width: 100px;" class="col-md-4 mb-3">')).attr('src', event.target.result).appendTo(place);
            
          }

          reader.readAsDataURL(file.files[i]);
        }
      }
      else{
        swal('Tối đa chỉ nên 3 hình ảnh', {
            icon: "error",
        }).then(() => $('#product_list_image').val(''))
      }
    }
    
  </script>
@endsection