@extends('backend.layout')

@section('content')
<div class="content">
    <div class="container-fluid">
      @include('backend.note')
      <form action="admin/users" method="POST">
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Thêm Người Dùng</h4>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tên người dùng <span class="text-danger">*</span></label>
                      <input type="text" value="{{ old('user_name') }}" name="user_name" class="form-control" placeholder="Họ Tên">
                      @error('user_name')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email <span class="text-danger">*</span></label>
                      <input type="email" value="{{ old('user_email') }}" name="user_email" class="form-control"  placeholder="Email">
                      @error('user_email')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Mật Khẩu <span class="text-danger">*</span></label>
                      <input type="password"  name="user_password" class="form-control"  placeholder="Mật khẩu">
                      @error('user_password')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Xác Nhận Mật Khẩu <span class="text-danger">*</span></label>
                      <input type="password"  name="user_password_again" class="form-control"  placeholder="Xác Nhận Mật khẩu">
                      @error('user_password_again')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Vai Trò <span class="text-danger">*</span></label>
                      <select name="role_id" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">Quản lý sản phẩm</option>
                        <option value="3">Người dùng</option>
                      </select>
                    </div>
                  </div>
                </div>
          <button type="submit" class="btn btn-primary pull-right">Thêm Người Dùng</button>
          <a href="/admin/users" class="btn btn-primary pull-right">Danh Sách Người Dùng</a>
        <div class="clearfix"></div>
      </div>
      </form>
    </div>
  </div>
@endsection