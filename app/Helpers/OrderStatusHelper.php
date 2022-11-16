<?php

namespace App\Helpers;

class OrderStatusHelper
{
    public static function Status($orderstatus){
        $html = '';
        switch($orderstatus){
            case '1':
                $html .='Đang chờ xác nhận';
                break;
            case '2':
                $html .='Đã xác nhận đơn hàng';
                break;
            case '3':
                $html .='Đã đóng gói và gửi đến đơn vị vận chuyển';
                break;
            case '4':
                $html .='Đang giao hàng';
                break;
            case '5':
                $html .='Giao hàng thành công';
                break;
            case '6':
                $html .='Giao hàng thất bại';
                break;
        }
        return $html;
    }

    public static function StatusUser($status){
        $html = '';
        switch($status){
            case '1':
                $html .='Admin';
                break;
            case '2':
                $html .='Quản lý sản phẩm';
                break;
            case '3':
                $html .='Khách hàng';
                break;
        }
        return $html;
    }

    public static function StatusSelected($orderstatus, $status){
        $html = '';
        if($orderstatus == $status){
            $html .= "selected";
        }
        return $html;
    }
}
