@extends('backend.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="admin/categorys/create" class="btn btn-primary" data-color="green">Đăng loại sản phẩm mới</a>
        </div>
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh Sách Loại Sản Phẩm</h4>
                {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
            </div>

            @include('backend.note')

            <div class="card-body">
                <div class="table-responsive table-hover">
                <table class="table">
                    <thead class="text-primary">
                        <th style="width: 150px;">Tên Loại</th>
                        <th class="text-center">Số sản phẩm</th>
                        <th>Thông tin</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <input type="hidden" value="{{$item->category_id}}" class="id_delete">
                            <td>{{$item->category_name}}</td>
                            <td  class="text-center">{{count($item->product)}}</td>
                            <td>Từ khóa: {{$item->category_keyword}} <br>
                                Mô tả: {{$item->category_description}}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Hành động
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="admin/categorys/{{$item->category_id}}/edit">Sửa</a>
                                        @if (count($item->product) == 0)
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
        var category_id = $(this).closest('tr').find('.id_delete').val();
        var token = $('input[name=_token]').val();

        swal({
            title: "Bạn có chắc sẽ xóa loại sản phẩm này",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'DELETE',
                    url: 'admin/categorys/'+category_id,
                    data: {
                        '_token': token,
                        'id': category_id,
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