@extends('frontend.layout')

@section('content')
    <!-- Start Product Details Area -->
    <section class="htc__product__details bg__white ptb--100">
        <!-- Start Product Details Top -->
        <div class="htc__product__details__top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                        <div class="htc__product__details__tab__content">
                            <!-- Start Product Big Images -->
                            <div class="product__big__images">
                                <div class="portfolio-full-image tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="img-tab-0">
                                        <img style="width: 460px; height: 460px" src="{{$data->product_image}}" alt="full-image">
                                    </div>
                                    @foreach ($dataProductImages as $item)
                                    <div role="tabpanel" class="tab-pane fade" id="img-tab-{{$item->image_id}}">
                                        <img  style="width: 460px; height: 460px" src="{{$item->image_name}}" alt="full-image">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- End Product Big Images -->
                            <!-- Start Small images -->
                            <ul class="product__small__images" role="tablist">
                                <li role="presentation" class="pot-small-img active">
                                    <a href="#img-tab-0" role="tab" data-toggle="tab">
                                        <img style="width: 80px" src="{{$data->product_image}}" alt="small-image">
                                    </a>
                                </li>
                                @foreach ($dataProductImages as $item)
                                <li role="presentation" class="pot-small-img">
                                    <a href="#img-tab-{{$item->image_id}}" role="tab" data-toggle="tab">
                                        <img style="width: 80px" src="{{$item->image_name}}" alt="small-image">
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            <!-- End Small images -->
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="ht__product__dtl">
                            <h2>{{$data->product_name}}</h2>
                            <h6>Từ khóa: <span>{{$data->product_keyword}}</span></h6>
                            <ul class="rating">
                                @if ($rating == 1)
                                <li><i class="icon-star icons"></i></li>
                                <li class="old"><i class="icon-star icons"></i></li>
                                <li class="old"><i class="icon-star icons"></i></li>
                                <li class="old"><i class="icon-star icons"></i></li>
                                <li class="old"><i class="icon-star icons"></i></li>
                                @elseif($rating == 2)
                                <li><i class="icon-star icons"></i></li>
                                <li><i class="icon-star icons"></i></li>
                                <li class="old"><i class="icon-star icons"></i></li>
                                <li class="old"><i class="icon-star icons"></i></li>
                                <li class="old"><i class="icon-star icons"></i></li>
                                @elseif($rating == 3)
                                <li><i class="icon-star icons"></i></li>
                                <li><i class="icon-star icons"></i></li>
                                <li><i class="icon-star icons"></i></li>
                                <li class="old"><i class="icon-star icons"></i></li>
                                <li class="old"><i class="icon-star icons"></i></li>
                                @elseif($rating == 4)
                                <li><i class="icon-star icons"></i></li>
                                <li><i class="icon-star icons"></i></li>
                                <li><i class="icon-star icons"></i></li>
                                <li><i class="icon-star icons"></i></li>
                                <li class="old"><i class="icon-star icons"></i></li>
                                @elseif($rating == 5)
                                <li><i class="icon-star icons"></i></li>
                                <li><i class="icon-star icons"></i></li>
                                <li><i class="icon-star icons"></i></li>
                                <li><i class="icon-star icons"></i></li>
                                <li><i class="icon-star icons"></i></li>
                                @else
                                {{'Chưa có đánh giá sao nào'}}
                                @endif
                            </ul>
                            <ul class="rating">
                                <li>Giảm {{$data->product_sale}}%</li> <br>
                            </ul>
                            <ul  class="pro__prize">
                                
                                <li class="old__prize">{{number_format($data->product_price_sell)}} VNĐ</li>
                                <li>{{number_format($product_price_sale = $data->product_price_sell - ($data->product_price_sell/100 * $data->product_sale))}} VNĐ</li>
                            </ul>
                            <br>
                            <ul class="rating">
                                @if ($data->product_amount != 0)
                                <li>Số lượng còn {{$data->product_amount}}</li> <br>
                                @else
                                <li class="text-danger">Sản phẩm này đã hết hàng</li> <br>
                                @endif
                                
                            </ul>
                            <p class="pro__info"></p>
                            <div class="ht__pro__desc">
                                <div class="sin__desc">
                                    <p><span><br>{!!$data->product_attribute!!}</span></p>
                                </div>
                            <form>
                                @csrf
                                @php
                                    $product_price_sale = $data->product_price_sell - ($data->product_price_sell/100 * $data->product_sale);
                                @endphp
                                <input type="hidden" class="cart_product_{{$data->product_id}}" value="{{$data->product_name}}">
                                <input type="hidden" class="cart_price_{{$data->product_id}}" value="{{$data->product_price_buy}}">
                                <input type="hidden" class="cart_price_sale_{{$data->product_id}}" value="{{$product_price_sale}}">
                                <input type="hidden" class="cart_amount_{{$data->product_id}}" value="{{$data->product_amount}}">
                                <input type="hidden" class="cart_quantity_{{$data->product_id}}" value="1">
                                <input type="hidden" class="cart_image_{{$data->product_id}}" value="{{$data->product_image}}">
                                <div class="sin__desc">
                                    <ul class="payment__btn" >
                                        <li style="display: flex;">
                                            @if ($data->product_amount != 0)
                                            <button class="add_to_cart btn" style="width:200px; margin-right: 20px"  data-id="{{$item->product_id}}" type="button">Thêm Vào Giỏ Hàng <i class="icon-handbag icons"></i></button>
                                            @endif
                                            {{-- <a style="width:200px" href="/checkout">mua ngay</a> --}}
                                        </li>
                                    </ul>
                                </div>
                            </form>
                                <div class="sin__desc align--left">
                                    <p><span>Loại sản phẩm:</span></p>
                                    <ul class="pro__cat__list">
                                        <li><a href="/shop/category/{{$data->category_id}}">{{$data->category->category_name}}</a></li>
                                    </ul>
                                </div>
                                <div class="sin__desc align--left">
                                    <p><span>Không gian decor:</span></p>
                                    <ul class="pro__cat__list">
                                        <li><a href="/shop/brand/{{$data->brand_id}}">{{$data->brand->brand_name}}</a></li>
                                    </ul>
                                </div>
                                <div class="sin__desc product__share__link">
                                    <p><span>Share this:</span></p>
                                    <ul class="pro__share">
                                        <li><a href="#" target="_blank"><i class="icon-social-twitter icons"></i></a></li>

                                        <li><a href="#" target="_blank"><i class="icon-social-instagram icons"></i></a></li>

                                        <li><a href="https://www.facebook.com/Furny/?ref=bookmarks" target="_blank"><i class="icon-social-facebook icons"></i></a></li>

                                        <li><a href="#" target="_blank"><i class="icon-social-google icons"></i></a></li>

                                        <li><a href="#" target="_blank"><i class="icon-social-linkedin icons"></i></a></li>

                                        <li><a href="#" target="_blank"><i class="icon-social-pinterest icons"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Details Top -->
    </section>
    <!-- End Product Details Area -->
    <!-- Start Product Description -->
    <section class="htc__produc__decription bg__white">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Start List And Grid View -->
                    <ul class="pro__details__tab" role="tablist">
                        <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">Thông Tin</a></li>
                        <li role="presentation" class="review"><a href="#review" role="tab" data-toggle="tab">Bình Luận</a></li>
                    </ul>
                    <!-- End List And Grid View -->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="ht__pro__details__content">
                        <!-- Start Single Content -->
                        <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                            <div class="pro__tab__content__inner">
                                {!!$data->product_detail!!}
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div role="tabpanel" id="review" class="pro__single__content tab-pane fade">
                            <div class="pro__tab__content__inner">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="ht__product__dtl">
                                            <h2 class="show-rating">Đánh giá: <span>
                                                @if ($rating == 0)
                                                    {{'CHưa có đánh giá nào'}}
                                                @else
                                                    {{$rating}}
                                                @endif    
                                            </span></h2>
                                        </div>
                                        @if ($checkCmt)
                                        <div class="stars">
                                            <form> 
                                                @csrf
                                                <input class="star star-5" id="star-5" type="radio" name="star" value="5"/> <label class="star star-5" for="star-5"></label> 
                                                <input class="star star-4" id="star-4" type="radio" name="star" value="4"/> <label class="star star-4" for="star-4"></label> 
                                                <input class="star star-3" id="star-3" type="radio" name="star" value="3"/> <label class="star star-3" for="star-3"></label> 
                                                <input class="star star-2" id="star-2" type="radio" name="star" value="2"/> <label class="star star-2" for="star-2"></label> 
                                                <input class="star star-1" id="star-1" type="radio" name="star" value="1"/> <label class="star star-1" for="star-1"></label> 
                                                <textarea style="background: #fff; min-width: 260px; border: none" name="comment_customer" cols="30" rows="5" placeholder="Viết bình luận của bạn ở đây"></textarea>
                                                <ul class="payment__btn mt-0">
                                                    <li><button type="button" class="btn form-control btn-comment" data-product_id="{{$data->product_id}}">Gửi bình luận</button></li>
                                                </ul>
                                            </form>
                                        </div>
                                        @else 
                                        <span class="text-danger">Bạn cần đăng nhập và mua sản phẩm để bình luận</span>
                                        @endif
                                        
                                    </div>
                                    <div class="col-md-8">
                                        <div class="ht__product__dtl">
                                            <h2>Danh sách bình luận:</h2>
                                        </div>
                                        <br>
                                        <div class="comment-list">
                                            <div class="comment-add"></div>
                                            @foreach ($dataComment as $item)
                                            <div class="single-comment">    
                                                <p><span class="text-danger">{{date('d/m/Y',strtotime($item->created_at))}} {{$item->user->user_name}} 
                                                    @php
                                                        $rating = '';
                                                        for ($i=0; $i < $item->comment_rating; $i++) { 
                                                            $rating = $rating . '<i style="color: red" class="icon-star icons"></i>';  
                                                        };
                                                    @endphp
                                                        {!! $rating !!}
                                                    </span>
                                                    : {{$item->comment_customer}}
                                                </p> 
                                                @if ($item->comment_admin != '')
                                                <p><span class="text-danger">--Trả lời từ Admin:</span> {{$item->comment_admin}}</p>    
                                                @endif
                                            </div>
                                            <hr>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Description -->
    <!-- Start Product Area -->
    <section class="htc__product__area--2 pb--100 product-details-res">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    
                    <div class="section__title--2 text-center">
                        @if (count($dataProductCategory) > 0)
                        <h2 class="title__line">SẢN PHẨM LIÊN QUAN</h2>

                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product__wrap clearfix">
                    @foreach ($dataProductCategory as $item)
                    <!-- Start Single Product -->
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-6" style="height: 390px">
                    @include('frontend.libs.product')
                    </div>
                    <!-- End Single Product -->
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Area -->
@endsection

@section('script')
    <script>
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
                success: function (data) {
                    //
                    Swal.fire(data)
                    //
                }
            })

        })

        $('.btn-comment').click(function(){
            var productId = $(this).data('product_id');
            var _token = $('input[name=_token]').val();
            var commentCustomer = $('[name=comment_customer]').val();
            var commentRating = $('input[name=star]:checked').val();
            var html = '';
            var star = '';
            // alert(commentRating)
            $.ajax({
                url: 'add-comment-customer',
                method: 'POST',
                data: {
                    _token: _token,
                    product_id: productId,
                    comment_customer: commentCustomer,
                    comment_rating: commentRating,
                },
                success: function(data){
                    if(data[3] == 1){
                        star = `<i style="color: red" class="icon-star icons"></i>`
                    }
                    else if(data[3] == 2){
                        star = `<i style="color: red" class="icon-star icons"></i>
                                <i style="color: red" class="icon-star icons"></i>`
                    }
                    else if(data[3] == 3){
                        star = `<i style="color: red" class="icon-star icons"></i>
                                <i style="color: red" class="icon-star icons"></i>
                                <i style="color: red" class="icon-star icons"></i>`
                    }
                    else if(data[3] == 4){
                        star = `<i style="color: red" class="icon-star icons"></i>
                                <i style="color: red" class="icon-star icons"></i>
                                <i style="color: red" class="icon-star icons"></i>
                                <i style="color: red" class="icon-star icons"></i>`
                    }
                    else if(data[3] == 5){
                        star = `<i style="color: red" class="icon-star icons"></i>
                                <i style="color: red" class="icon-star icons"></i>
                                <i style="color: red" class="icon-star icons"></i>
                                <i style="color: red" class="icon-star icons"></i>
                                <i style="color: red" class="icon-star icons"></i>`
                    }
                    else{
                        star = ''
                    }
                    
                    html = `<div class="single-comment-${data[0]}">    
                                <p>
                                    <span class="text-danger">${data[4]} ${data[1]} ${star}</span>
                                    : ${data[2]}
                                </p> 
                            </div>
                            <hr>`;
                    $('.comment-add').after(html)
                    if(data[5] == 0){
                        $('.show-rating').text('Đánh giá: Chưa có đánh giá')
                    }
                    else{
                        $('.show-rating').text('Đánh giá: ' + data[5])
                    }
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