@extends('backend.layout')

@section('content')
<div class="content">
    <div class="container-fluid">
      @include('backend.note')
      <form action="admin/posts/{{$data->id}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Sửa Bài Viết</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tiêu đề<span class="text-danger">*</span></label>
                    <input type="text" name="post_title" value="{{$data->post_title}}" class="form-control">
                    @error('post_title')
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
                    <img src="{{$data->post_image}}" id="image" style="width:200px" alt="Ảnh bài viết">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nội dung</label>
                    <textarea name="post_content" id="my-editor-1" cols="30" rows="10" class="ckeditor">{{$data->post_content}}</textarea>
                    @error('post_content')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
          <button type="submit" class="btn btn-primary pull-right">Sửa Bài Viết</button>
          <a href="/admin/posts" class="btn btn-primary pull-right button_add_ship">Danh sách Bài Viết</a>
        </form>
        <div class="clearfix"></div>
      </div>
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
  </script>
@endsection