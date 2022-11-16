<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;

    protected $table = 'categorys';

    protected $primaryKey = 'category_id';

    /**
     * Get all of the product for the CategoryModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany(ProductModel::class, 'category_id', 'category_id');
    }
}
