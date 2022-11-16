@extends('backend.layout')

@section('content')
<div class="container-fluid">
    @include('backend.note')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh Sách Bình Luận</h4>
                {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive table-hover">
                <table class="table">
                    <thead class=" text-primary">
                        <th>Tên Khách Hàng</th>
                        <th>Sản Phẩm</th>
                        <th>Đánh Giá</th>
                        <th>Thời Gian</th>
                        <th>Tình Trạng</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr class="tr-{{$item->comment_id}}">
                            <td>{{$item->user->user_name  ?? 'Khách hàng'}}</td>
                            <td>{{$item->product->product_name ?? 'Sản phẩm đã bị xóa'}}</td>
                            <td>{{$item->comment_rating}}</td>
                            <td>{{date('d/m/Y',strtotime($item->created_at))}}</td>
                            <td>
                                @if ($item->comment_status == 1)
                                    {{'Chưa trả lời'}}
                                @elseif($item->comment_status == 2)
                                    {{'Đã trả lời'}}
                                @elseif($item->comment_status == 3)
                                    {{'Hiện thị ở trang chủ'}}
                                @else
                                    {{'Tắt ở trang chủ'}}
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hành động
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="admin/comments/{{$item->comment_id}}">Xem chi tiết</a>
                                        <form>
                                            @csrf
                                            <a class="dropdown-item button-delete" data-id='{{$item->comment_id}}' href="#">Xóa</a>
                                        </form>
                                        @if ($item->comment_status == 3)
                                        <form action="admin/comments/off/{{$item->comment_id}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit" class="dropdown-item">Tắt Hiển thị</button>
                                            <div class="clearfix"></div>
                                        </form>
                                        @else
                                        <form action="admin/comments/slide/{{$item->comment_id}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit" class="dropdown-item">Hiển thị</button>
                                            <div class="clearfix"></div>
                                        </form>
                                        @endif
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
        var comment_id = $(this).data('id');
        var token = $('input[name=_token]').val();

        swal({
            title: "Bạn có chắc sẽ xóa comment này",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'DELETE',
                    url: 'admin/comments/'+ comment_id,
                    data: {
                        '_token': token,
                        'id': comment_id,
                    },
                    success: function (response) {
                        swal(response.msgSuccess, {
                            icon: "success",
                        })
                        .then((willDelete) => $('.tr-'+comment_id).remove());
                    }
                })
            }
        });
        })
</script>
    
@endsection