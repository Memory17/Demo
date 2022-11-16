<div class="category">
    <div class="ht__cat__thumb">
        @if ($item->product_sale != 0)
        <span class="sale-span">-{{$item->product_sale}}%</span>
        @endif
        @if ($item->product_amount == 0)
        <span class="sale-span">Hết Hàng</span>
        @endif
        <a href="/shop/product/{{$item->product_id}}-{{Str::slug($item->product_name, '-')}}.html">
            <img style="max-width: 260px; height: 260px" src="{{$item->product_image}}" alt="{{$item->product_name}}">
        </a>
    </div>
    <div class="fr__hover__info">
        <form>
            @csrf
            @php
                $product_price_sale = $item->product_price_sell - ($item->product_price_sell/100 * $item->product_sale);
            @endphp
            <input type="hidden" class="cart_product_{{$item->product_id}}" value="{{$item->product_name}}">
            <input type="hidden" class="cart_price_{{$item->product_id}}" value="{{$item->product_price_sell}}">
            <input type="hidden" class="cart_price_sale_{{$item->product_id}}" value="{{$product_price_sale}}">
            <input type="hidden" class="cart_amount_{{$item->product_id}}" value="{{$item->product_amount}}">
            <input type="hidden" class="cart_quantity_{{$item->product_id}}" value="1">
            <input type="hidden" class="cart_image_{{$item->product_id}}" value="{{$item->product_image}}">
        <ul class="product__action">
            @if ($item->product_amount != 0)
            <li><button class="add_to_cart" data-id="{{$item->product_id}}" type="button"><i class="icon-handbag icons"></i></button></li>
            @endif
        </form>
        <form>
            @csrf
            <li><button class="handle_wishlist" data-product_id="{{$item->product_id}}" type="button"><i class="icon-heart icons"></i></button></li>
        </form>
        </ul>
    </div>
    <div class="fr__product__inner">
        <h4><a href="/shop/product/{{$item->product_id}}-{{Str::slug($item->product_name, '-')}}.html">{{$item->product_name}}</a></h4>
        <ul class="fr__pro__prize">
            @if ($item->product_sale != 0)
            <li class="old__prize">{{number_format($item->product_price_sell)}} VNĐ</li>
            @endif
            <li>{{number_format($product_price_sale)}} VNĐ</li>
        </ul>
    </div>
</div>