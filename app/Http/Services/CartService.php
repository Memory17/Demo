<?php

namespace App\Http\Services;


use App\Models\ProductModel;

class CartService
{
    public function cart($cart, $coupon){
        if($cart){
            if($coupon){
                $coupon_cart =  $coupon['coupon_show'];
            }
            else {
                $coupon_cart =  0;
            }

            $cart_total = $this->getTotal($cart);
            $cart_totals = $this->getTotals($cart_total, $coupon);

            return true;
        }
        else{
            return redirect('/')->with('msgSuccess', 'Giỏ hàng trống');
        }
    }

    //Hàm xử lý tính tổng theo sản phẩmgiỏ hàng
    public function getTotal($cart){
        $cart_total = 0;
        foreach($cart as $key => $val){
            $cart_total += $val['cart_price_sale']*$val['cart_quantity'];
        }
        return $cart_total;
    }

    //Hàm xử lý tính tổng giỏ hàng
    public function getTotals($cart_total, $coupon){
        $cart_totals = 0;
        if($coupon){
            if($coupon['coupon_status'] == 1){
                // $coupon_cart = $coupon['coupon_value'] . ' %';
                $cart_totals = $cart_total - ($cart_total/100 * $coupon['coupon_value']);
            }
            else if($coupon['coupon_status'] == 2){
                // $coupon_cart = $coupon['coupon_value'] . ' VNĐ';

                $cart_totals = $cart_total - $coupon['coupon_value'];
            }
        }
        else{
            $cart_totals = $cart_total;
        }

        return $cart_totals;
    }
}
