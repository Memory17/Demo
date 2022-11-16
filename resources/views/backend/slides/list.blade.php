@extends('backend.layout')

@section('content')
<div class="container-fluid">
    @include('backend.note')
    <div class="row">
        <div class="col-md-12">
            <a href="admin/slides/create" class="btn btn-primary" data-color="green">Thêm Slide</a>
        </div>

        @include('backend.note')

        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh Sách Slide</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive table-hover">
                <table class="table">
                    <thead class=" text-primary">
                        <th>Tiêu đề</th>
                        <th>Hình ảnh</th>
                        <th>Target</th>
                        <th>Vị trí</th>
                        <th>Trạng thái</th>    
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <input type="hidden" value="{{$item->id}}" class="id_delete">
                        <td>{{$item->slide_title}}</td>
                        <td><img src="{{$item->image}}" width="150px" alt=""></td>
                        <td>{{$item->target}}</td>
                        <td>
                            @if ($item->type == 1)
                                {{'Slide show'}}
                            @else
                                {{'Banner ngang'}}
                            @endif
                        </td>
                        <td>
                            @if ($item->active == 1)
                                {{'Đang kích hoạt'}}
                            @else
                                {{'Không kích hoạt'}}
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="admin/slides/{{$item->id}}/edit">Sửa</a>
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
                        url: 'admin/slides/'+deleteId,
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

