<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Permission\Entities\Role;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'slug',
        'email',
        'mobile',
        'password',
        'role_id',
        'status',
        'recovery_code',
        'login_detail',
    ];

    public function udtail()
    {
        return $this->hasOne(Udetail::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
