<?php

namespace Modules\Advertisement\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'add_type',
        'filename',
        'location',
        'link',
        'created_by',
        'update_by',
    ];

}
