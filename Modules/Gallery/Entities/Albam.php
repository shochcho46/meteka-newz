<?php

namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Gallery\Entities\Gallery;

class Albam extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'slider',
        'created_by',
        'update_by',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
}
