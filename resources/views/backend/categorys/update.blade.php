@extends('backend.layout')

@section('content')
<div class="content">
    <div class="container-fluid">
      @include('backend.note')
      <form action="admin/categorys/{{$data->category_id}}" method="POST">
        @method('PATCH')
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Sửa loại sản phẩm</h4>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tên loại Sản Phẩm</label>
                      <input type="text" name="category_name" value="{{$data->category_name}}" class="form-control">
                      @error('category_name')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Từ Khóa</label>
                      <input type="text" name="category_keyword" value="{{$data->category_keyword}}" class="form-control">
                      @error('category_keyword')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Description</label>
                      <input type="text" name="category_description" value="{{$data->category_description}}" class="form-control">
                      @error('category_description')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Sửa Loại Sản Phẩm</button>
          <a href="/admin/categorys" class="btn btn-primary pull-right">Danh sách loại sản phẩm</a>
        <div class="clearfix"></div>
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection
