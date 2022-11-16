<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderstatusModel extends Model
{
    use HasFactory;

    protected $table = 'orderstatus';
    protected $primaryKey = 'order_status_id';

    public $timestamps = false;
}
