<!doctype html>
<html lang="en">
  <head>
    <title>Đơn hàng</title>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="/">
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
         /* @font-face {
            font-family: 'Roboto';
            src: url({{ storage_path('fonts\Roboto-Regular.ttf') }}) format('truetype');
        }
        *{ font-family: 'Roboto' !important; } */
    </style>
</head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">LM-HOUSEW</h3>
                <p class="text-center">Đơn hàng ngày {{date('d/m/Y',strtotime($dataOrder->created_at))}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="test-primary" style="font-size: 20px; font-weight: 400;">Thông tin đặt hàng</p>
                {{$dataOrder->order_shipping}} <br>
                Hình thức thanh toán:   @if ($dataOrder->order_pay_type == 1)
                                            {{'Thanh toán khi nhận hàng'}}
                                        @else
                                            {{'Thanh toán chuyển khoản'}}
                                        @endif
                                        <br>
                Trạng thái: {!!\App\Helpers\OrderStatusHelper::Status($dataOrder->order_status)!!}
            </div>
            
        </div>
        <br>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <p class="test-primary" style="font-size: 20px; font-weight: 400;">Sản phẩm</p>
                <table class="table text-center" style="border: none">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Số lượng</td>
                            <td>Giá</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataOrderdetail as $item)
                        <tr>
                            <td>{{$item->product->product_name ?? 'Sản phẩm đã bị xóa'}}</td>
                            <td>{{$item->order_detail_quantity}}</td>
                            <td>{{number_format($item->order_detail_price)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
            <p  style="font-size: 20px; font-weight: 400;">Tổng: {{number_format($dataOrder->order_total)}} VNĐ</p>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 col-sm-3 offset-sm-8 text-center">
                Người tiếp nhận <br>
                Ký tên <br>
                {{ auth()->user()->user_name }}
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>