@extends('backend.layout')

@section('content')
<div class="content">
    <div class="container-fluid">
      @include('backend.note')
      <form action="admin/slides/{{$data->id}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Sửa Slide</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tiêu đề<span class="text-danger">*</span></label>
                    <input type="text" name="slide_title" value="{{$data->slide_title}}" class="form-control">
                    @error('slide_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Target<span class="text-danger">*</span></label>
                    <input type="text" name="target" value="{{$data->target}}" class="form-control">
                    @error('target')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="">
                    <label class="bmd-label-floating">Hình ảnh<span class="text-danger">*</span></label>
                    <input type="file" id="product_image" name="product_image" onchange="chosseFile(this)" class="form-control" accept="image/*">
                    @error('product_image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <br>    
                    <img src="{{$data->image}}" id="image" style="width:200px" alt="Ảnh sản phẩm">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Vị trí<span class="text-danger">*</span></label>
                    <select name="type" class="form-control">
                      <option value="1" @if ($data->active == 1)
                        selected
                    @endif>Slideshow</option>
                      <option value="2" @if ($data->active == 2)
                        selected
                    @endif>Banner ngang</option>
                    </select>
                    @error('type')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Trạng thái<span class="text-danger">*</span></label>
                    <select name="active" class="form-control">
                      <option value="1" @if ($data->active == 1)
                          selected
                      @endif>Kích hoạt</option>
                      <option value="2" @if ($data->active == 2)
                        selected
                    @endif>Tắt kích hoạt</option>
                    </select>
                    @error('active')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
          <button type="submit" class="btn btn-primary pull-right">Sửa Slide</button>
          <a href="/admin/slides" class="btn btn-primary pull-right button_add_ship">Danh sách slide</a>
        </form>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
@endsection

@section('script')
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
  </script>
@endsection