<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Notifications\Notifiable;

class Udetail extends Model implements HasMedia
{
    use HasFactory, Notifiable,InteractsWithMedia;

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'city',
        'blood',
        'gender',
        'country_id',
        'age',
        'address',
        'zip',
        'idtype',
        'idnumber',
        'idimgloc',
        'imgloc',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
