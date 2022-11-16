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
              {{-- <p class="card-category">Complete your profile</p> --}}
            </div>
            <div class="card-body">
              <form action="admin/products" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tên Sản Phẩm</label>
                      <input type="text" value="{{ old('product_name') }}" name="product_name" class="form-control">
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
                        <input type="text" value="{{ old('product_keyword') }}" name="product_keyword" class="form-control">
                        @error('product_keyword')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Mô tả</label>
                        <input type="text" value="{{ old('product_description') }}" name="product_description" class="form-control">
                        @error('product_description')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Giá Nhập</label>
                        <input type="number" value="{{ old('product_price_buy') }}" name="product_price_buy" class="form-control">
                        @error('product_price_buy')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                        <label class="bmd-label-floating">Giá Bán</label>
                        <input type="number" value="{{ old('product_price_sell') }}" name="product_price_sell" class="form-control">
                        @error('product_price_sell')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Khuyễn Mãi</label>
                      <input type="number" value="{{ old('product_sale') }}" name="product_sale" class="form-control">
                      @error('product_sale')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="bmd-label-floating">Số Lượng</label>
                      <input type="number" value="{{ old('product_amount') }}" name="product_amount" class="form-control">
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
                          <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                        @endforeach
                      </select>
                      @error('category_id')
                        <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Không gian decor</label>
                      <select name="brand_id" class="form-control">
                        <option value="">---Chọn Không Gian---</option>
                        @foreach ($dataBrand as $item)
                          <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
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
                <img src="../libs/image_no.png" id="image" style="width:200px" alt="Ảnh sản phẩm">
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
                    <div class="col-md-12"  id="list_image">
    
                    </div>
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
                    <textarea name="product_detail" id="my-editor-1" cols="30" rows="10" class="ckeditor">{{old('product_detail')}}</textarea>
                    @error('product_detail')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Mô tả</label>
                    <textarea name="product_attribute" id="my-editor-2" cols="30" rows="10"  class="ckeditor">{{old('product_attribute')}}</textarea>
                    @error('product_attribute')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary pull-right">Thêm Sản Phẩm</button>
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