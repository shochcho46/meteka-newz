<?php

namespace Modules\Websetting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'appid',
        'app_secrete_kye',
        'app_token_page',
        'app_long_token_page',
        'pageid',

    ];

}
