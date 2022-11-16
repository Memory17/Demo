@extends('backend.layout')

@section('content')
<div class="container-fluid">
    @include('backend.note')
    <div class="row">
        <div class="col-md-12">
            <a href="admin/coupons/create" class="btn btn-primary" data-color="green">Thêm Mã Giảm Giá</a>
        </div>

        @include('backend.note')

        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh Sách Mã Giảm Giá</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive table-hover">
                <table class="table">
                    <thead class=" text-primary">
                        <th>Tên Mã</th>
                        <th>Mã Giảm Giá</th>
                        <th>Giá Trị</th>
                        <th>Loại Mã</th>    
                        <th>Hạn Sử Dụng</th>    
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <input type="hidden" value="{{$item->coupon_id}}" class="id_delete">
                        <td>{{$item->coupon_name}}</td>
                        <td>{{$item->coupon_code}}</td>
                        <td>
                            @if ($item->coupon_status == 1)
                                {{$item->coupon_value}} %
                            @elseif($item->coupon_status == 2)
                                {{number_format($item->coupon_value)}} VNĐ
                            @endif
                        </td>
                        <td>
                            @if ($item->coupon_status == 1)
                                {{'Giảm Theo Phần Trăm'}}
                            @elseif($item->coupon_status == 2)
                                {{'Giảm Theo Tiền'}}
                            @endif
                        </td>
                        <td>{{$item->coupon_expiry}}</td>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="admin/coupons/{{$item->coupon_id}}/edit">Sửa</a>
                                    <form>
                                        @csrf
                                        <a class="dropdown-item button-delete" href="#">Xóa</a>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-3 offset-md-4">
                  {{ $data->links("pagination::bootstrap-4") }}
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('.button-delete').click(function (e) {
            e.preventDefault();
            var deleteId = $(this).closest('tr').find('.id_delete').val();
            var token = $('input[name=_token]').val();
            // alert(token);
            swal({
                title: "Bạn có chắc sẽ xóa",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: 'DELETE',
                        url: 'admin/coupons/'+deleteId,
                        data: {
                            _token: token,
                            id: deleteId,
                        },
                        success: function (response) {
                            swal(response.msgSuccess, {
                                icon: "success",
                            })
                            .then((willDelete) => location.reload())
                        }
                    })
                }
            });
        })
    })
</script>
@endsection

