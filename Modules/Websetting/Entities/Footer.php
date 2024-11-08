<?php

namespace Modules\Websetting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'contact',
        'email',
        'house',
        'road',
        'location',
        'footer_detail',
        'location_text',
        'copyright',

    ];

}
