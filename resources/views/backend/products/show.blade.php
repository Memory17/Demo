@extends('backend.layout')
@section('style')
    <style>
        span{
            font-size: 15px;
            color: #9124a3;
        }
    </style>
@endsection
@section('content')
<div class="content">
<div class="container-fluid">
    <div class="row">
        @include('backend.note')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Thông Tin Sản Phẩm</h4>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Tên Sản Phẩm: </label>
                                    <span> {{ $data->product_name}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Từ khóa:</label>
                                    <span> {{ $data->category->category_keyword}}</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Mô tả:</label>
                                    <span> {{ $data->brand->brand_description}}</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Loại:</label>
                                    <span> {{ $data->category->category_name}}</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Không gian:</label>
                                    <span> {{ $data->brand->brand_name}}</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Giá mua:</label>
                                    <span>{{ number_format($data->product_price_buy)}} VNĐ</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Giá bán:</label>
                                    <span>{{ number_format($data->product_price_sell)}} VNĐ</span>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Số Lượng: </label>
                                    <span> {{ $data->product_amount}}</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Giảm giá:</label>
                                    <span> {{ $data->product_sale}} %</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Thuộc tính: </label>
                                    <span> {!! $data->product_attribute!!}</span>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Chi tiết:</label>
                                    <span> {!! $data->product_detail!!} </span>
                                </div>
                            </div>
                        </div>
                        
                    <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Ảnh Sản Phẩm</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="display: flex;justify-content: center;">
                            <img style="width:200px; " src="{{ $data->product_image }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" style="display: flex;justify-content: center;">
                            @foreach ($images as $item)
                            <img style="width: 28%; margin-right: 10px" src="{{ $item->image_name }}" alt="">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
