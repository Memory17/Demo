@extends('backend.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        @include('backend.note')
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh Sách Đơn Hàng</h4>
                {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive table-hover">
                <table class="table">
                    <thead class=" text-primary">
                        <th>Mã Hóa Đơn</th>
                        <th>Khách Hàng</th>
                        <th>Tổng Tiền</th>
                        <th>Ngày Mua</th>
                        <th>Trạng Thái</th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>#{{$item->order_id}}</td>
                        <td>{{$item->user->user_name ?? 'Khách hàng'}}</td>
                        <td>{{number_format($item->order_total)}}</td>
                        <td>{{date('d/m/Y',strtotime($item->created_at))}}</td>
                        <td>{!! \App\Helpers\OrderStatusHelper::Status($item->order_status) !!}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" target="_blank" href="admin/generate-pdf/{{$item->order_id}}">Xuất file PDF</a>
                                    <a class="dropdown-item" href="admin/orders/{{$item->order_id}}">Xem chi tiết</a>
                                    <form>
                                        @csrf
                                        <input type="hidden" class="id_delete" value="{{$item->order_id}}">
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
        $('.button-delete').click(function (e) {
            
        e.preventDefault();
        var order_id = $('.id_delete').val();
        var token = $('input[name=_token]').val();

        swal({
            title: "Bạn có chắc sẽ xóa hóa đơn này này",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'DELETE',
                    url: 'admin/orders/'+ order_id,
                    data: {
                        '_token': token,
                        'id': order_id,
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
    </script>
@endsection