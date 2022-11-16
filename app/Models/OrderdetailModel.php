<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderdetailModel extends Model
{
    use HasFactory;
    protected $table = 'orderdetail';
    protected $primaryKey = 'order_detail_id';

    /**
     * Get the order that owns the OrderdetailModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(OrderModel::class, 'order_id', 'order_id');
    }
    /**
     * Get the product that owns the ProductModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id', 'product_id');
    }
}
