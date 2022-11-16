@extends('backend.layout')

@section('content')
<div class="container-fluid">
    @include('backend.note')
    <div class="row">
        <div class="col-md-12">
            <a href="admin/ships/create" class="btn btn-primary" data-color="green">Thêm Phí Vận Chuyển Khu Vực</a>
        </div>

        @include('backend.note')

        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Danh Sách Phí Vận Chuyển</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive table-hover">
                <table class="table">
                    <thead class=" text-primary">
                        <th>Tỉnh/Thành Phố</th>
                        <th>Quận/Huyện</th>
                        <th>Phí</th>
                        <th></th>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <input type="hidden" value="{{$item->ship_id}}" class="id_delete">
                        <td>{{$item->city->city_name}}</td>
                        <td>{{$item->district->district_name}}</td>
                        <td>{{number_format($item->ship_price)}} VNĐ
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="admin/ships/{{$item->ship_id}}/edit">Sửa</a>
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
                        url: 'admin/ships/'+deleteId,
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

