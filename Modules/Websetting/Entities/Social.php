<?php

namespace Modules\Websetting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'id',
        'link',
        'icone',
        'status',

    ];

}
