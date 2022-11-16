@extends('backend.layout')

@section('content')
<div class="content">
    <div class="container-fluid">
      @include('backend.note')
    {{-- START FORM GỬI AJAX LẤY DATA QUẬN/HUYỆN --}}
      <form>
        @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Sửa Phí Vận Chuyển</h4>
            </div>
            <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Tỉnh Thành Phố<span class="text-danger">*</span></label>
                        <span class="form-control">{{$data->city->city_name}}</span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Quận/ Huyện <span class="text-danger">*</span></label>
                      <span class="form-control">{{$data->district->district_name}}</span>
                    </div>
                  </div>
                </div>
      </form> 
      {{-- END FORM GỬI AJAX LẤY DATA QUẬN/HUYỆN --}}


      {{-- START FORM GỬI DATA SỬA GIÁ VẬN CHUYỂN --}}
        <form action="admin/ships/{{$data->ship_id}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Giá Vận Chuyển <span class="text-danger">*</span></label>
                      <input type="number" class="form-control price" value="{{$data->ship_price}}" name="ship_price">
                    </div>
                  </div>
                </div>
          <button type="submit" class="btn btn-primary pull-right">Sửa Phí Vận Chuyển</button>
          <a href="/admin/ships" class="btn btn-primary pull-right button_add_ship">Danh sách phí vận chuyển</a>
        </form>
      {{-- END FORM GỬI DATA SỬA GIÁ VẬN CHUYỂN --}}

        <div class="clearfix"></div>
      </div>
    </div>
  </div>
@endsection
