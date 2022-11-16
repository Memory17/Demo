@extends('backend.layout')

@section('content')
<div class="content">
    <div class="container-fluid">
      @include('backend.note')
      <form action="admin/users/{{$data->user_id}}" method="POST">
        @method('PATCH')
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Sửa Vai Trò</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tên người dùng <span class="text-danger">*</span></label>
                    <input type="text" name="user_name" value="{{$data->user_name}}" class="form-control" readonly>
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
                    <input type="email" name="user_email" value="{{$data->user_email}}" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Vai trò <span class="text-danger">*</span></label>
                    <select name="role_id" class="form-control">
                      <option value="1" @if ($data->role_id == 1)
                          {{"selected"}}
                      @endif>Admin</option>
                      <option value="2" @if ($data->role_id == 2)
                        {{"selected"}}
                      @endif>Quản lý sản phẩm</option>
                      <option value="3" @if ($data->role_id == 3)
                        {{"selected"}}
                    @endif>Người dùng</option>
                    </select>
                  </div>
                </div>
              </div>
            <button type="submit" class="btn btn-primary pull-right">Sửa Vai Trò</button>
            <a href="/admin/users" class="btn btn-primary pull-right">Danh Sách Người Dùng</a>
        <div class="clearfix"></div>
      </div>
      </form>
    </div>
  </div>
@endsection