@extends('backend.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="admin/users/create" class="btn btn-primary" data-color="green">Thêm Người Dùng</a>
        </div>

        @include('backend.note')

        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh Sách Người Dùng</h4>
                {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive table-hover">
                <table class="table">
                    <thead class=" text-primary">
                        {{-- <th>ID</th> --}}
                        <th>Tên Người Dùng</th>
                        <th>Email</th>
                        <th>Vai Trò</th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                    <tr>
                        {{-- <td>{{$item->id}}</td> --}}
                        <input type="hidden" value="{{$item->user_id}}" class="id_delete">
                        <td>{{$item->user_name}}</td>
                        <td>{{$item->user_email}}</td>
                        <td>{!! \App\Helpers\OrderStatusHelper::StatusUser($item->role_id) !!}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="admin/users/{{$item->user_id}}/edit">Sửa</a>
                                    @if ($item->role_id != 1)
                                    <form>
                                        @csrf
                                        <a class="dropdown-item button-delete" href="#">Xóa</a>
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
                  {{ $data->render("pagination::bootstrap-4") }}
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
                title: "Bạn có chắc sẽ xóa người dùng này",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: 'DELETE',
                        url: 'admin/users/'+deleteId,
                        data: {
                            '_token': token,
                            'id': deleteId,
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

