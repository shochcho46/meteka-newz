<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Epaper extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'page_number',
        'location',
        'filename',
        'imgloc',
        'created_by',
        'update_by',
    ];

}
