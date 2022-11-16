<?php

namespace App\Models\Ship;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipModel extends Model
{
    use HasFactory;
    protected $table = 'ships';
    protected $primaryKey = 'ship_id';


    /**
     * Get the city that owns the ShipModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(CityModel::class, 'city_id', 'city_id');
    }

    /**
     * Get the district that owns the ShipModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(DistrictModel::class, 'district_id', 'district_id');
    }
}
