<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ship\CityModel;

class OrderModel extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    /**
     * Get all of the orderdetail for the OrderModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderdetail()
    {
        return $this->hasMany(OrderdetailModel::class, 'order_id', 'order_id');
    }

    /**
     * Get the user that owns the OrderModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    /**
     * Get the city that owns the OrderModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(CityModel::class, 'city_id', 'city_id');
    }

    /**
     * Get the orderstatus that owns the OrderModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderstatus()
    {
        return $this->belongsTo(OrderstatusModel::class, 'order_status', 'order_status_id');
    }
}
