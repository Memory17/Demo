<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $primaryKey = 'brand_id';

    /**
     * Get all of the product for the CategoryModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany(ProductModel::class, 'brand_id', 'brand_id');
    }
}
