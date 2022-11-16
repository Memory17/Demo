<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HOUSEW - {{$data_seo->meta_title}}</title>
    <!---seo------->
    <meta name="description" content="{{$data_seo->meta_description}}">
    <meta name="keywords" content="{{$data_seo->meta_keyword}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{{$data_seo->url_canonical}}">
    <meta content="" name="author"/>
    <!---seo fb------->
    <meta property="og:site_name" content="http://127.0.0.1:8000/"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{$data_seo->url_canonical}}"/>
    <meta property="og:title" content="Long Decor - {{$data_seo->meta_title}}"/>
    <meta property="og:description" content="{{$data_seo->meta_description}}"/>
    @if (isset($data_seo_image))
        <meta property="og:image" content="{{$data_seo_image}}"/>
    @else
        <meta property="og:image" content="../libs/vinaneon-logo.jpg"/>
    @endif

    <link rel="shortcut icon" type="image/x-icon" href="../libs/logo-2.jpg">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    

    <base href="/">
    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="../frontend_assets/css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="../frontend_assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../frontend_assets/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="../frontend_assets/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="../frontend_assets/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="../frontend_assets/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="../frontend_assets/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="../frontend_assets/css/custom.css">
    {{-- <!-- dark mode-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="../"> --}}

    @yield('style')
    <!-- Modernizr JS -->
    <script src="../frontend_assets/js/vendor/modernizr-3.5.0.min.js"></script>
    {{-- <!--dark mod -->
    <script src="dard_mod.js"></script> --}}
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        @include('frontend.menu')
        <!-- End Header Area -->

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        @include('frontend.offset')
        <!-- End Offset Wrapper -->
        
        @yield('content')

        <!-- Start Footer Area -->
        <footer id="htc__footer">
            <!-- Start Footer Widget -->
            <div class="footer__container bg__cat--1">
                <div class="container">
                    <div class="row">
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="footer">
                                <h2 class="title__line--2">Thông tin</h2>
                                <div class="ft__details">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <p>HOUSEW SHOP luôn luôn mong muốn đem đến cho quý khách hàng những sản phẩm uy tín, chất lượng, giá cả tốt nhất thị trường</p>
                                        </div>
                                    </div>
                                    <div class="ft__social__link">
                                        <ul class="social__link">
                                            <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>

                                            <li><a href="#"><i class="icon-social-google icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h2 class="title__line--2">MENU</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="/">Trang chủ</a></li>
                                        <li><a href="/shop">Cửa hàng</a></li>
                                        <li><a href="/blog">Bài viết</a></li>
                                        <li><a href="/contact">Liên hệ</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h2 class="title__line--2">kHÔNG GIAN</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        @foreach ($dataBrand as $item)
                                            <li><a href="/shop/brand/{{$item->brand_id}}-{{Str::slug($item->brand_name, '-')}}.html">{{$item->brand_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h2 class="title__line--2">LOẠI SẢN PHẨM</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        @foreach ($dataCategory as $item)
                                            <li><a href="/shop/category/{{$item->category_id}}-{{Str::slug($item->category_name, '-')}}.html">{{$item->category_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                    </div>
                </div>
            </div>
            <!-- End Footer Widget -->
        </footer>
        <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "108936238307868");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="../frontend_assets/js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="../frontend_assets/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../frontend_assets/js/plugins.js"></script>
    <script src="../frontend_assets/js/slick.min.js"></script>
    <script src="../frontend_assets/js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="../frontend_assets/js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="../frontend_assets/js/main.js"></script>
    @include('sweetalert::alert')
    @yield('script')
    <script>
        $('#keyword').keyup(function () {
            var query = $(this).val();
            var _token = $('input[name=_token]').val();
            // alert(query)
            if(query != ''){
                $.ajax({
                    url: 'get-data-search',
                    method: 'POST',
                    data: {
                        _token: _token,
                        query: query,
                    },
                    success: function (data) {
                        $('.ajax-search').fadeIn();
                        $('.ajax-search').html(data);

                        $('.choose').click(function () {
                            
                            $('#keyword').val($(this).text())
                            $('.ajax-search').fadeOut();
                        })
                    }
                })
            }
        })

       

        $('.cart__menu').click(function(){
            var output = '';
            $.ajax({
                type: "GET",
                url: 'get_data_cart',
                success: function(data) {
                    var formatter = new Intl.NumberFormat('en-US', {
                    // style: 'currency',
                    currency: 'VND',
                    });
                    if(Array.isArray(data[0])){
                        data[0].forEach(item => {
                        output +=`<div class="shp__single__product tr-${item['cart_id']}">
                                <div class="shp__pro__thumb">
                                    <a href="#">
                                        <img src="${item['cart_image']}" alt="product images">
                                    </a>
                                </div>
                                <div class="shp__pro__details">
                                    <h2><a href="/shop/product/${item['cart_id']}">${item['cart_product']}</a></h2>
                                    <span class="quantity">QTY: ${item['cart_quantity']}</span>
                                    <span class="shp__price">${formatter.format(item['cart_price_sale'])+ ' VNĐ'}</span>
                                </div>
                                <form>
                                @csrf
                                <div class="remove__btn">
                                    <button type="button" class="button_del" data-id-delete-cart="${item['cart_id']}">
                                        <i class="zmdi zmdi-close"></i>
                                    </button>
                                </div>
                                </form>
                            </div>`
                    });
                    }else{
                        output = data[0]
                    }
                    

                    $('.total__price').text(data[1].toLocaleString('ja-JP')+ ''+ ' VNĐ');
                    $('.shp__cart__wrap').html(output);
                    
                    //Handle delete product in cart offset
                    $('.button_del').click(function () {
                        var id = $(this).data('id-delete-cart');
                        var _token = $('input[name=_token]').val();
                        
                        $.ajax({
                            url: 'delete_cart_offset',
                            method: 'POST',
                            data: {
                                _token: _token,
                                cart_id: id,
                            },
                            success: function(dataDel){
                                $('.tr-'+id).remove();
                                $('.total__price').text(dataDel[0].toLocaleString('ja-JP')+ ''+ ' VNĐ');
                            }
                        })
                    })
                }
            });
        })
    </script>
</body>

</html>