@extends('backend.layout')

@section('content')
<div class="content">
    <div class="container-fluid">
      @include('backend.note')
      <form action="admin/brands" method="POST">
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Thêm Không Gian Decor</h4>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tên Không Gian Decor</label>
                      <input type="text" value="{{ old('brand_name') }}" name="brand_name" class="form-control">
                      @error('brand_name')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Từ Khóa</label>
                      <input type="text" value="{{ old('brand_keyword') }}" name="brand_keyword" class="form-control">
                      @error('brand_keyword')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Mô Tả</label>
                      <input type="text" value="{{ old('brand_description') }}" name="brand_description" class="form-control">
                      @error('brand_description')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Thêm Không Gian Decor</button>
          <a href="/admin/brands" class="btn btn-primary pull-right">Danh sách không gian decor</a>
        <div class="clearfix"></div>
        </div>
      </div>
      </form>
    </div>
  </div>
@endsection