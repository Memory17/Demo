<div class="offset__wrapper">
    <!-- Start Search Popap -->
    <div class="search__area">
        <div class="container" >
            <div class="row" >
                <div class="col-md-12" >
                    <div class="search__inner">
                        <form action="/shop" autocomplete="off" method="GET">
                            <input placeholder="Tìm kiếm sản phẩm... " type="text" name="search_keyword" id="keyword">
                            <div class="ajax-search"></div>
                            <button type="submit"></button>
                        </form>
                        <div class="search__close__btn">
                            <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Search Popap -->
    <!-- Start Cart Panel -->
    <div class="shopping__cart">
        <div class="shopping__cart__inner">
            <div class="offsetmenu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <div class="shp__cart__wrap">
                {{-- Cart offset sẽ hiện thị ở đây --}}
            </div>
            <ul class="shoping__total">
                <li class="subtotal">Tổng:</li>
                <li class="total__price"></li>
            </ul>
            <ul class="shopping__btn">
                <li><a href="/cart">Xem giỏ hàng</a></li>
            </ul>
        </div>
    </div>
    <!-- End Cart Panel -->
</div>