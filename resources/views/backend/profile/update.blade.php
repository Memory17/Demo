@extends('backend.layout')

@section('content')
<div class="content">
    <div class="container-fluid">
      @include('backend.note')
      <form action="admin/profile/update" method="POST">
        @method('PATCH')
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Sửa Thông Tin Admin</h4>
              {{-- <p class="card-category">Complete your profile</p> --}}
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Họ Tên Quản Lý <span class="text-danger">*</span></label>
                      <input type="text" name="user_name" value="{{$data->user_name}}" class="form-control">
                      @error('user_name')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Email</label>
                      <input type="email" name="user_email" value="{{$data->user_email}}" class="form-control" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Mật Khẩu Cũ <span class="text-danger">*</span></label>
                      <input type="password" name="user_password_old" class="form-control" placeholder="Mật khẩu cũ">
                      @error('user_password_old')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Mật Khẩu Mới <span class="text-danger">*</span></label>
                      <input type="password" name="user_password" class="form-control"  placeholder="Mật khẩu mới">
                      @error('user_password')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nhắc Lại Mật Khẩu <span class="text-danger">*</span></label>
                      <input type="password" name="user_password_again" class="form-control" placeholder="Xác nhận mật khẩu mới">
                      @error('user_password_again')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                </div>
        <button type="submit" class="btn btn-primary pull-right">Update Thông Tin</button>
        <div class="clearfix"></div>
      </div>
      </form>

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