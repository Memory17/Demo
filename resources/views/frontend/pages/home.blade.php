@extends('frontend.layout')

@section('content')
    @include('frontend.note')
    <!-- Start Slider Area -->
    <div class="slider__container slider--one bg__cat--3">
        <div class="slide__container slider__activation__wrap owl-carousel">
            @foreach ($dataSilde as $slide)
            <!-- Start Single Slide -->
            <div class="single__slide animation__style01 slider__fixed--height">
                <div class="container">
                    <div class="row align-items__center">
                        <div class="col-md-7 col-sm-7 col-xs-12 col-lg-6">
                            <div class="slide">
                                <div class="slider__inner">
                                    <h1>{{$slide->slide_title}}</h1>
                                    <div class="cr__btn">
                                        <a href="{{$slide->target}}">View Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-5 col-xs-12 col-md-5">
                            <div class="slide__thumb">
                                <img src="{{$slide->image}}" alt="slider images VINANEON">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Slide -->
            @endforeach
        </div>
    </div>
    <!-- Start Slider Area -->
    <!-- Start Product new Area -->
    <section class="htc__category__area ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">SẢN PHẨM MỚI</h2>
                    </div>
                </div>
            </div>
            <div class="htc__product__container">
                <div class="row">
                    <div class="product__list clearfix mt--30">
                        @foreach ($dataProductNews as $item)
                            <!-- Start Single Category -->
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-6" style="height: 390px">
                            @include('frontend.libs.product')
                            </div>
                            <!-- End Single Category -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product new Area -->
    <!-- Start Banner Area -->
    @if ($dataBanner != null)
    <section class="ftr__product__area ptb--50">
        <div class="container-fluid">
            <center>
                <a href="{{$dataBanner->target}}"><img style="max-width: 100%" src="{{$dataBanner->image}}" alt="{{$dataBanner->title}}"></a>
            </center>
        </div>
    </section>
    @endif
    <!-- End Banner Area -->
    <!-- Start Product sale Area -->
    <section class="ftr__product__area ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">TOP KHUYẾN MÃI</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product__list clearfix mt--30">
                    @foreach ($dataProductSales as $item)
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-6" style="height: 390px">
                        @include('frontend.libs.product')
                        </div>
                        <!-- End Single Category -->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Product sale Area -->
    <!-- Start Comment Area -->
    <section class="htc__testimonial__area bg__cat--4">
        <div class="container">
            <div class="row">
                <div class="ht__testimonial__activation clearfix">
                    @foreach ($dataComment as $item)
                    <!-- Start Single Testimonial -->
                    <div class="col-lg-6 col-md-6 single__tes">
                        <div class="testimonial">
                            <div class="testimonial__thumb">
                                <img style="width:90px" src="{{$item->product->product_image}}" alt="{{$item->product->product_name}}">
                            </div>
                            <div class="testimonial__details">
                                <h4><a href="/shop/product/{{$item->product_id}}-{{Str::slug($item->product->product_name)}}">{{$item->user->user_name}}</a></h4>
                                <p>{{$item->comment_customer}} </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial -->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Comment Area -->
    <!-- Start Top Rated Area -->
    @if ($dataProductSell != null)
    <section class="top__rated__area bg__white pt--100 pb--110">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">TOP BÁN CHẠY</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product__wrap clearfix">
                    @foreach ($dataProductSell as $item)
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-6" style="height: 390px">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <span class="sale-span">-{{$item->product->product_sale}}%</span>
                                    <a href="/shop/product/{{$item->product->product_id}}">
                                        <img style="max-width: 260px; height: 260px" src="{{$item->product->product_image}}" alt="{{$item->product->product_name}}">
                                    </a>
                                </div>
                                <div class="fr__hover__info">
                                    <form>
                                        @csrf
                                        @php
                                            $product_price_sale = $item->product->product_price_sell - ($item->product->product_price_sell/100 * $item->product->product_sale);
                                        @endphp
                                        <input type="hidden" class="cart_product_{{$item->product->product_id}}" value="{{$item->product->product_name}}">
                                        <input type="hidden" class="cart_price_{{$item->product->product_id}}" value="{{$item->product->product_price_sell}}">
                                        <input type="hidden" class="cart_price_sale_{{$item->product->product_id}}" value="{{$product_price_sale}}">
                                        <input type="hidden" class="cart_amount_{{$item->product->product_id}}" value="{{$item->product->product_amount}}">
                                        <input type="hidden" class="cart_quantity_{{$item->product->product_id}}" value="1">
                                        <input type="hidden" class="cart_image_{{$item->product->product_id}}" value="{{$item->product->product_image}}">
                                    <ul class="product__action">
                                        <li><button class="add_to_cart" data-id="{{$item->product->product_id}}" type="button"><i class="icon-handbag icons"></i></button></li>
                                    </form>
                                    <form>
                                        @csrf
                                        <li><button class="handle_wishlist" data-product_id="{{$item->product->product_id}}" type="button"><i class="icon-heart icons"></i></button></li>
                                    </form>
                                    </ul>
                                </div>
                                <div class="fr__product__inner">
                                    <h4><a href="/shop/product/{{$item->product->product_id}}-{{Str::slug($item->product->product_name, '-')}}.html"></a></h4>
                                    <ul class="fr__pro__prize">
                                        <li class="old__prize">{{number_format($item->product->product_price_sell)}} VNĐ</li>
                                        <li>{{number_format($product_price_sale)}} VNĐ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- End Top Rated Area -->
    <!-- Start Blog Area -->
    <section class="ftr__product__area ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section__title--2 text-center">
                        <h2 class="title__line">BÀI VIẾT MỚI NHẤT</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product__list clearfix mt--30">
                    @foreach ($dataPost as $item)
                        <!-- Start Single Category -->
                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-6" style="height: 390px">
                            <div class="category">
                                <div class="ht__cat__thumb">
                                    <span class="sale-span">New</span>
                                    <a href="/blog/{{$item->id}}-{{Str::slug($item->post_title, '-')}}.html">
                                        <img style="max-width: 260px; height: 260px" src="{{$item->post_image}}" alt="{{$item->post_title}}">
                                    </a>
                                </div>
                                <div class="fr__product__inner" style="margin-top: -15px">
                                    <ul class="fr__pro__prize">
                                        <li><a style="font-size: 10px" href="/shop/blog/{{$item->id}}-{{Str::slug($item->post_title, '-')}}.html">Ngày đăng:
                                            @php
                                                $old_date = strtotime($item->created_at);
                                                $new_date = date('10/11/2022', $old_date);  
                                                echo $new_date
                                            @endphp
                                        </a></li>
                                    </ul>
                                    <h4><a href="/blog/{{$item->id}}-{{Str::slug($item->post_title, '-')}}.html"><i style="
                                        max-width: 250px;
                                        height: 40px;
                                        line-height: 20px;
                                        word-break: break-all;
                                        display: -webkit-box;
                                        -webkit-box-orient: vertical;
                                        -moz-box-orient: vertical;
                                        -ms-box-orient: vertical;
                                        box-orient: vertical;
                                        -webkit-line-clamp: 2;
                                        -moz-line-clamp: 2;
                                        -ms-line-clamp: 2;
                                        line-clamp: 2;
                                        overflow: hidden;
                                        ">{{$item->post_title}}</i></a></h4>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Category -->
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog Area -->
@endsection

@section('script')
    <script>
        $('.add_to_cart').click(function () {
            var id = $(this).data('id');
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
                success: function (data) {
                    //
                    Swal.fire(data)
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