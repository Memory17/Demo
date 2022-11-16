<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'products';

    protected $primaryKey = 'product_id';

    /**
     * Get the category that owns the ProductModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id', 'category_id');
    }

    /**
     * Get the brand that owns the ProductModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(BrandModel::class, 'brand_id', 'brand_id');
    }
}
