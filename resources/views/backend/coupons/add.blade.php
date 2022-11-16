@extends('backend.layout')

@section('content')
<div class="content">
    <div class="container-fluid">
      @include('backend.note')
      <form action="admin/coupons" method="POST">
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Thêm Mã Giảm Giá</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tên Mã Giảm Giá<span class="text-danger">*</span></label>
                    <input type="text" value="{{ old('coupon_name') }}" name="coupon_name" class="form-control">
                    @error('coupon_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Mã Giảm Giá<span class="text-danger">*</span></label>
                    <input type="text" value="{{ old('coupon_code') }}" name="coupon_code" class="form-control">
                    @error('coupon_code')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Giá Trị<span class="text-danger">*</span></label>
                    <input type="text" value="{{ old('coupon_value') }}" name="coupon_value" class="form-control">
                    @error('coupon_value')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Loại Mã Giảm Giá<span class="text-danger">*</span></label>
                    <select name="coupon_status" class="form-control">
                      <option value="1">Giảm Theo Phần Trăm</option>
                      <option value="2">Giảm Theo Tiền</option>
                    </select>
                    @error('coupon_status')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Ngày Hết Hạn<span class="text-danger">*</span></label>
                    <input type="date" value="{{ old('coupon_expiry') }}" name="coupon_expiry" class="form-control">
                    @error('coupon_expiry')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
          <button type="submit" class="btn btn-primary pull-right button_add_ship">Thêm Mã Giảm Giá</button>
          <a href="/admin/coupons" class="btn btn-primary pull-right button_add_ship">Danh sách mã giảm giá</a>
        <div class="clearfix"></div>
      </div>
      </form>
    </div>
  </div>
@endsection