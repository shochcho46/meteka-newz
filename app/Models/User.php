<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Permission\Entities\Role;
use Modules\Post\Entities\Post;
use Modules\User\Entities\Udetail;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable,InteractsWithMedia;

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

    public function posts()
    {
        return $this->hasMany(Post::class,'created_by', 'id');
    }

}
