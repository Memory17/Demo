@extends('backend.layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="admin/brands/create" class="btn btn-primary" data-color="green">Thêm Không Gian Decor</a>
        </div>
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Không Gian Decor</h4>
            </div>

            @include('backend.note')

            <div class="card-body">
                <div class="table-responsive table-hover">
                <table class="table">
                    <thead class="text-primary text-center">
                        <th style="width: 150px;">Không Gian</th>
                        <th class="text-center">Số sản phẩm</th>
                        <th>Thông tin</th>
                        <th></th>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($data as $item)
                        <tr>
                            <input type="hidden" value="{{$item->brand_id}}" class="id_delete">
                            <td>{{$item->brand_name}}</td>
                            <td>{{count($item->product)}}</td>
                            <td>Từ khóa: {{$item->brand_keyword}} <br>
                                Mô tả: {{$item->brand_description}}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Hành động
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="admin/brands/{{$item->brand_id}}/edit">Sửa</a>
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
        var brand_id = $(this).closest('tr').find('.id_delete').val();
        var token = $('input[name=_token]').val();

        swal({
            title: "Bạn có chắc sẽ xóa không gian decor này",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'DELETE',
                    url: 'admin/brands/'+brand_id,
                    data: {
                        '_token': token,
                        'id': brand_id,
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