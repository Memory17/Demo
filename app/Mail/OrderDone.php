<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDone extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $orderdetail;
    public $coupon;
    public $ship;
    public $dataUser;
    public $orderShipping;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $dataUser, $orderShipping, $orderdetail, $coupon, $ship)
    {
        $this->order = $order;
        $this->dataUser = $dataUser;
        $this->orderShipping = $orderShipping;
        $this->orderdetail = $orderdetail;
        $this->coupon = $coupon;
        $this->ship = $ship;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Đặt Hàng Thành Công')->view('mail.orderdone');
    }
}
