@extends('backend.layout')

@section('content')
<div class="content">
  <div class="container-fluid">
      <div class="row">
        @include('backend.note')
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Thông Tin Đặt Hàng</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table class="table">
                  <tbody>
                  <tr>
                      <td>{{$dataOrder->order_shipping}}</td>
                  </tr>
                  <form action="admin/orders/{{$dataOrder->order_id}}" method="post">
                    @method('PATCH')
                    @csrf
                  <tr>
                    <td colspan="2">
                      <div class="form-group">
                        <select name="order_status" class="form-control">
                            <option value="1" 
                              @if ($dataOrder->order_status == 1)
                                  selected
                              @endif
                            >Đang chờ xác nhận</option>
                            <option value="2" 
                            @if ($dataOrder->order_status == 2)
                                  selected
                              @endif
                            >Đã xác nhận đơn hàng</option>
                            <option value="3"
                            @if ($dataOrder->order_status == 3)
                                  selected
                              @endif
                            >Đã đóng gói và gửi đến đơn vị vận chuyển</option>
                            <option value="4" 
                            @if ($dataOrder->order_status == 4)
                                  selected
                              @endif
                            >Đang giao hàng</option>
                            <option value="5"
                            @if ($dataOrder->order_status == 5)
                                  selected
                              @endif
                            >Giao hàng thành công</option>
                            <option value="6" 
                            @if ($dataOrder->order_status == 6)
                                  selected
                              @endif
                            >Giao hàng thất bại</option>
                        </select>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2"><button type="submit" class="btn btn-primary">Sửa trạng thái</button></td>
                  </tr>
                  </form>
                  </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Hóa Đơn Chi Tiết</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive table-hover">
              <table class="table">
                  <thead class=" text-primary">
                      <th>Sản Phẩm</th>
                      <th>Số Lượng</th>
                      <th>Hình Ảnh</th>
                      <th>Giá</th>
                  </thead>
                  <tbody>
                  @foreach ($dataOrderdetail as $item)
                  <tr>
                    <td>{{$item->product->product_name}}</td>
                    <td>{{$item->order_detail_quantity}}</td>
                    <td><img style="max-width: 110px" src="../images_product/{{$item->product->product_image}}" alt=""></td>
                    <td>{{number_format($item->order_detail_price)}}</td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
              
              </div>
            </div>
          </div>
        </div>
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