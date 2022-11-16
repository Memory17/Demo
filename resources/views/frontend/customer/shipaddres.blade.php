@extends('frontend.layout')

@section('content')
    <div class="container" style="margin-top: 50px; margin-bottom: 50px">
        @include('frontend.note')
        <div class="row">
            <center><p style="color: #c43b68; font-size: 2em">Thông tin Địa Chỉ Khách Hàng</p></center>
        </div>
        <br>
        <div class="row mt-5">
            <div class="col-md-3 ">
                @include('frontend.customer.menu')
                <form action="/customer/logout" method="post">
                    @csrf
                    <button class="btn" style="color: #c43b68; border: 1px solid #c43b68; background: transparent; border-radius: 0">Đăng Xuất</button>
                </form>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <form>
                            @csrf
                                <div class="form-group">
                                    <select name="city_id"  id="city_id"  class="form-control">
                                        <option value="select">Tỉnh/Thành Phố</option>
                                        @foreach ($dataCity as $item)
                                        <option value="{{$item->city_id}}" @if ($item->city_id == $data->user_city)
                                            {{'selected'}}
                                        @endif>{{$item->city_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                        </form>
                        <form>
                            @csrf
                                <div class="form-group">
                                    <select name="district_id" id="district_id"  class="form-control">
                                        <option value="select">Quận Huyện</option>
                                        @if ($data->user_district != null)
                                        <option value="{{$data->user_district}}" selected>{{$data->District->district_name}}</option>
                                        @endif
                                    </select>
                                    @error('district_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                        </form>
                        <form action="/customer/change_addres" method="post">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="user_phone" value="{{$data->user_phone}}" class="form-control">
                                @error('user_phone')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="user_addres" value="{{$data->user_addres}}" class="form-control">
                                @error('user_addres')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <input type="hidden" name="user_district" value="{{$data->user_district}}">
                            <input type="hidden" name="user_city"  value="{{$data->user_city}}">
                            <button class="btn" type="submit">Đổi thông tin địa chỉ</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#city_id').change(function(){
            var _token = $('input[name=_token]').val()
            var city_id = $('#city_id').val()
            var html = '<option value="select">Quận Huyện</option>';
            $.ajax({
                url: 'get_district_checkout',
                method: 'POST',
                data: {
                    _token: _token,
                    city_id: city_id,
                },
                success: function (data) {
                    data.forEach(item => {
                        html += `<option value="${item.district_id}">${item.district_name}</option>`
                    });
                    $('#district_id').html(html)
                    $('input[name=user_city]').val(city_id)

                    $('#district_id').change(function(){
                        var district_id = $('#district_id').val()
                        $('input[name=user_district]').val(district_id)
                    })
                }
            })
        })
    </script>
@endsection