<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishlistModel extends Model
{
    use HasFactory;

    protected $table = 'wishlist';

    protected $primaryKey = 'wishlist_id';

    public $timestamps = false;

    /**
     * Get the user that owns the WishlistModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
    }

    /**
     * Get the product that owns the WishlistModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(ProductModel::class, 'product_id', 'product_id');
    }
}
