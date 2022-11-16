@extends('backend.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        @include('backend.note')
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh Sách Lời Nhắn</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive table-hover">
                <table class="table">
                    <thead class=" text-primary">
                        <th>Họ Tên</th>
                        <th>Email</th>
                        <th>Tiêu Đề</th>
                        <th>Lời Nhắn</th>
                        <th>Trạng Thái</th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->requirement_name}}</td>
                        <td>{{$item->requirement_email}}</td>
                        <td>{{$item->requirement_title}}</td>
                        <td>{{$item->requirement_value}}</td>
                        <td>
                            @if ($item->requirement_active == 1)
                                Chưa trả lời
                            @else
                                Đã trả lời
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="admin/requirements/{{$item->id}}">Sửa trạng thái</a>
                                    <form>
                                        @csrf
                                        <input type="hidden" class="id_delete" value="{{$item->id}}">
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
            title: "Bạn có chắc sẽ xóa lời nhắn này",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'DELETE',
                    url: 'admin/requirements/'+ order_id,
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