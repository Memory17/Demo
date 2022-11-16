<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $primaryKey = 'role_id';

    /**
     * Get all of the users for the RoleModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Users()
    {
        return $this->hasMany(UserModel::class, 'role_id', 'role_id');
    }
}
