@extends('frontend.layout')

@section('content')
    <!-- cart-main-area start -->
    <div class="cart-main-area ptb--100 bg__white">
        @include('frontend.note')
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <form action="#">               
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">products</th>
                                        <th class="product-name">name of products</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                        <th class="product-remove">Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (Session::get('cart'))
                                        @foreach ($cart as $item)
                                        <tr class="tr-{{$item['cart_id']}}">
                                            <td class="product-thumbnail"><a href="/shop/product/{{$item['cart_id']}}-{{Str::slug($item['cart_product'], '-')}}.html"><img style="width: 100px; height: 120px" src="{{$item['cart_image']}}" alt="product img" /></a></td>
                                            <td class="product-name"><a href="/shop/product/{{$item['cart_id']}}-{{Str::slug($item['cart_product'], '-')}}.html">{{$item['cart_product']}}</a></td>
                                            <td class="product-price"><span class="amount">{{number_format($item['cart_price_sale'])}}</span></td>
                                            <form>
                                                @csrf
                                            <td class="product-quantity"><input class="get_qty" name="qty_{{$item['cart_id']}}" data-id="{{$item['cart_id']}}" type="number" value="{{$item['cart_quantity']}}" /></td>
                                            </form>
                                            <td class="product-subtotal" name='total_{{$item['cart_id']}}'>{{number_format($item['cart_price_sale'] * $item['cart_quantity'])}}</td>
                                            <td class="product-remove">
                                                <form>
                                                    @csrf
                                                    <button type="button" class="cart_delete" data-id_delete="{{$item['cart_id']}}">
                                                        <i class="icon-trash icons"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <span class="text-danger">Giỏ Hàng Hiện Tại Đang Trống</span>
                                    @endif
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="buttons-cart--inner">
                                    <div class="buttons-cart">
                                        <a href="/shop">Quay lại mua hàng</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (Auth::check())

                        @if (Session::get('cart') != null)
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="ht__coupon__code">
                                    <span>Mã Giảm Giá</span>
                                    <form>
                                    @csrf
                                    <div class="coupon__box">
                                        <input type="text" name="coupon_code" placeholder="Mã giảm giá">
                                        <div class="ht__cp__btn">
                                            <button id="check_coupon_cart" type="button">Áp Dụng</button>
                                        </div>
                                        <br>
                                    </div>
                                    <br>
                                    <p class="text-success" id="cart_coupon_message"></p>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                                <div class="htc__cart__total">
                                    <h6>Tổng giỏ hàng tạm tính</h6>
                                    <div class="cart__desk__list">
                                        <ul class="cart__desc">
                                            <li>Tổng giá sản phẩm</li>
                                            <li>Giảm giá</li>
                                        </ul>
                                        <ul class="cart__price">
                                            <li id="cart_total">{{number_format($cart_total)}} VNĐ</li>
                                            <li id="cart_coupon">
                                                <span id="cart_coupon_status"></span>
                                                {{$coupon_cart}}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cart__total">
                                        <span>Tổng: </span>
                                        <span id="cart_totals">{{number_format($cart_totals)}} VNĐ</span>
                                    </div>
                                    <ul class="payment__btn">
                                        <li class="active"><a href="/checkout">thanh toán</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @else 
                        <span class="text-danger">Bạn cần đăng nhập để thanh toán*</span>
                        {{-- <a href="/customer"><button type="button" class="btn btn-primary"> ---Đăng nhập---</button></a> --}}
                        @endif
                    </form> 
                </div>
            </div>
        </div>
    </div>
    <!-- cart-main-area end -->
@endsection

@section('script')
    <script>
        //Handle check add coupon code
        $('#check_coupon_cart').click(function () {
            var _token = $('input[name=_token]').val();
            var couponCode = $('input[name=coupon_code]').val();
            $.ajax({
                url: 'add_coupon_cart',
                method: 'POST',
                data: {
                    _token: _token,
                    coupon_code: couponCode,
                },
                success: function (data) {
                    $('#cart_coupon_message').text(data[0])
                    $('#cart_coupon').html(data[3])
                    $('#cart_totals').text(data[2].toLocaleString('ja-JP')+ ''+ ' VNĐ')
                }
            })
        })

        //Handle xóa cart cart
        $('.cart_delete').click(function () {
            var id = $(this).data('id_delete');
            var _token = $('input[name=_token]').val();
            $.ajax({
                url: 'delete_product_cart',
                method: 'POST',
                data: {
                    _token: _token,
                    cart_id: id,
                },

                success: function (data) {
                    $('.tr-'+id).remove()
                    
                    $('#cart_total').text(data[0].toLocaleString('ja-JP')+ ''+ ' VNĐ');
                    $('#cart_totals').text(data[1].toLocaleString('ja-JP')+ ''+ ' VNĐ')
                }
            })
        })

        //Handle cập nhận cart
        $('.get_qty').change(function() {
            var id = $(this).data('id');
            var cart_quantity = $('input[name=qty_'+id).val();
            var _token = $('input[name=_token]').val();
            $.ajax({
                url: 'update_quantity_cart',
                method: 'POST',
                data: {
                    _token: _token,
                    cart_quantity: cart_quantity,
                    cart_id: id,
                },
                success: function (data) {
                    $('#cart_totals').text(data[2].toLocaleString('ja-JP')+ ''+ ' VNĐ')
                    $('td[name=total_'+id).text(data[0].toLocaleString('ja-JP'));
                    $('input[name=qty_'+id).val(data[3]);
                    $('#cart_total').text(data[1].toLocaleString('ja-JP')+ ''+ ' VNĐ');
                }
            })
        })
    </script>
@endsection