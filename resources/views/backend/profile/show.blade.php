@extends('backend.layout')

@section('content')
<div class="container-fluid">
    @include('backend.note')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Thông Tin Quản Lý</h4>
                {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
            </div>
            <div class="card-body">
                <div class="table-responsive table-hover">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>Họ Tên</td>
                        <td class="text-primary">{{$data->user_name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td class="text-primary">{{$data->user_email}}</td>
                    </tr>
                    <tr>
                        <td>Vai Trò</td>
                        <td class="text-primary">
                            @if ($data->role_id == 1)
                                Admin
                                @elseif ($data->role_id == 2)
                                Quản lý sản phẩm
                                @elseif ($data->role_id == 4)
                                Quản lý bài viết
                                @else
                                ""
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
                <a href="admin/profile/update" class="btn btn-primary" class="btn btn-primary">Đổi Thông Tin</a>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
@endsection