@extends('frontend.layout')

@section('content')
    <!-- Start Product Grid -->
    <section class="htc__product__grid bg__white ptb--100">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                    <div class="htc__product__rightidebar">
                        <div class="htc__grid__top">
                            <div class="htc__select__option">
                                <form>
                                    @csrf
                                <select name="sort" id="sort" class="ht__select">
                                    <option>Hiện thị theo</option>
                                    <option value="{{Request::url()}}?sort_by=tang_dan">Giá sản phẩm tăng dần</option>
                                    <option value="{{Request::url()}}?sort_by=giam_dan">Giá sản phẩm giảm dần</option>
                                    <option value="{{Request::url()}}?sort_by=kitu_az">Theo kí tự A - Z</option>
                                    <option value="{{Request::url()}}?sort_by=kitu_za">Theo kí tự Z - A</option>
                                </select>
                                </form>
                            </div>
                        </div>
                        @if (count($data) <= 0)
                            <h5 class="text-center text-primary">Sản phẩm trống !!!</h5>
                        @endif
                        
                        <!-- Start Product View -->
                        <div class="row">
                            <div class="shop__grid__view__wrap">
                                <div class="single-grid-view tab-pane fade in active clearfix" id="show-filter">
                                    @foreach ($data as $item)
                                        <!-- Start Single Product -->
                                        <div class="col-md-4 col-lg-4 col-sm-4 col-xs-6" style="height: 390px">
                                            @include('frontend.libs.product')
                                        </div>
                                        <!-- End Single Product -->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- End Product View -->
                    </div>
                    <!-- Start Pagenation -->
                    <div class="row">
                        <div class="col-xs-12">
                            <ul class="htc__pagenation">
                                {{$data->render()}}
                            </ul>
                        </div>
                    </div>
                    <!-- End Pagenation -->
                </div>
                <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="htc__product__leftsidebar">
                        <!-- Start Prize Range -->
                        <div class="htc-grid-range">
                            <h4 class="title__line--4">Giá</h4>
                            <div class="content-shopby">
                                <div class="price_filter s-filter clear">
                                    <form method="get">
                                        {{-- @csrf --}}
                                        <div id="slider-range"></div>
                                        <input type="hidden" name="price_start" id="price_start" value="{{$priceMin}}">
                                        <input type="hidden" name="price_end" id="price_end" value="{{$priceMax}}">
                                        <div class="slider__range--output">
                                            <div class="price__output--wrap">
                                                <div class="price--output" style="width: 100%">
                                                    <input type="text" id="amount" readonly>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="price--filter">
                                            <button type="submit" class="btn btn-primary filter">Lọc</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Prize Range -->
                        <!-- Start Category Area -->
                        <div class="htc__category">
                            <h4 class="title__line--4">Loại Sản Phẩm</h4>
                            <ul class="ht__cat__list">
                                @foreach ($dataCategory as $item)
                                <li><a href="/shop/category/{{$item->category_id}}">{{$item->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Category Area -->
                        <!-- Start Category Area -->
                        <div class="htc__category">
                            <h4 class="title__line--4">Không Gian</h4>
                            <ul class="ht__cat__list">
                                @foreach ($dataBrand as $item)
                                <li><a href="/shop/brand/{{$item->brand_id}}">{{$item->brand_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Category Area -->
                        <!-- Start Best Sell Area -->
                        <div class="htc__recent__product">
                            <h2 class="title__line--4">Khuyến mãi</h2>
                            <div class="htc__recent__product__inner">
                                @foreach ($dataProductSales as $item)
                                <!-- Start Single Product -->
                                <div class="htc__best__product">
                                    <div class="htc__best__pro__thumb">
                                        <a href="/shop/product/{{$item->product_id}}-{{Str::slug($item->product_name, '-')}}.html">
                                            <img style="max-width: 100px; height: 120px" src="{{$item->product_image}}" alt="small product">
                                        </a>
                                    </div>
                                    <div class="htc__best__product__details">
                                        <h2><a href="/shop/product/{{$item->product_id}}-{{Str::slug($item->product_name, '-')}}.html">{{$item->product_name}}</a></h2>
                                        <ul class="rating">
                                            Giảm: {{$item->product_sale}}%
                                        </ul>
                                        <ul  class="pro__prize">
                                            <li>{{number_format($item->product_price_sell)}} VNĐ</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                                @endforeach
                                
                            </div>
                        </div>
                        <!-- End Best Sell Area -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grid -->
@endsection


@section('script')
    <script>
        $('#sort').change(function(){
            var sort_by = $(this).val()
            // alert(sort_by)
            if(sort_by){
                window.location = sort_by
            }
            return false
        })

        $( function() {
            $( "#slider-range" ).slider({
            orientation: "horizontol",
            range: true,
            min: {{$priceMin}},
            max: {{$priceMax}} ,
            step: 500,

            values: [ {{ $priceMinFilter }}, {{ $priceMaxFilter }}],
            slide: function( event, ui ) {
                $( "#amount" ).val( "đ" + ui.values[ 0 ] + " - đ" + ui.values[ 1 ] );
                $('#price_start').val(ui.values[ 0 ])
                $('#price_end').val(ui.values[ 1 ])
            }
            });
            $( "#amount" ).val( "đ" + $( "#slider-range" ).slider( "values", 0 ) +
            " - đ" + $( "#slider-range" ).slider( "values", 1 ) );
        } );

        $('.add_to_cart').click(function () {
            var id = $(this).data('id');
            // alert(id);
            var _token = $('input[name=_token]').val();
            var cart_product = $('.cart_product_' + id).val();
            var cart_price = $('.cart_price_' + id).val();
            var cart_price_sale = $('.cart_price_sale_' + id).val();
            var cart_amount = $('.cart_amount_' + id).val();
            var cart_quantity = $('.cart_quantity_' + id).val();
            var cart_image = $('.cart_image_' + id).val();

            $.ajax({
                url: 'add_to_cart',
                method: 'POST',
                data: {
                    _token: _token,
                    cart_id: id,
                    cart_product: cart_product,
                    cart_price: cart_price,
                    cart_price_sale: cart_price_sale,
                    cart_amount: cart_amount,
                    cart_quantity: cart_quantity,
                    cart_image: cart_image,
                },
                success: function () {
                    //
                    Swal.fire('Thêm giỏ hàng thành công')
                    //
                }
            })

        })

        $('.handle_wishlist').click(function(){
            var product_id = $(this).data('product_id');
            var _token = $('input[name=_token]').val();
            
            $.ajax({
                url: 'handle-wishlist',
                method: 'POST',
                data: {
                    _token: _token,
                    product_id: product_id,
                },
                success: function(data){
                    Swal.fire(data)
                }
            })
        })
    </script>
@endsection