@extends('backend.layout')

@section('content')
<div class="container-fluid">
    @include('backend.note')
    <div class="row">
        <div class="col-md-12">
            <a href="admin/products/create" class="btn btn-primary" data-color="green">Đăng sản phẩm mới</a>
        </div>
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh Sách Sản Phẩm</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive table-hover">
                <table class="table">
                    <thead class=" text-primary">
                        <th>Tên</th>
                        <th>Loại</th>
                        <th>Không Gian</th>
                        <th>Hình Ảnh</th>
                        <th>Kho Hàng</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <input type="hidden" value="{{$item->product_id}}" class="id_delete">
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->category->category_name ?? ''}}</td>
                            <td>{{$item->brand->brand_name ?? ''}}</td>
                            <td><img style="width: 100px" src="{{$item->product_image}}" alt=""></td>
                            <td>
                                @if ($item->product_amount == 0)
                                    {{'Hết hàng'}}
                                @else
                                    {{'Còn hàng'}}
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hành động
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="admin/products/{{$item->product_id}}/edit">Sửa</a>
                                        <a class="dropdown-item" href="admin/products/{{$item->product_id}}">Xem chi tiết</a>
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

      $('.button-delete').click(function (e) {
          
        e.preventDefault();
        var product_id = $(this).closest('tr').find('.id_delete').val();
        var token = $('input[name=_token]').val();

        swal({
            title: "Bạn có chắc sẽ xóa sản phẩm này",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'DELETE',
                    url: 'admin/products/'+ product_id,
                    data: {
                        '_token': token,
                        'id': product_id,
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