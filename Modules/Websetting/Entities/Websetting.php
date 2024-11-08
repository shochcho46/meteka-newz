<?php

namespace Modules\Websetting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'logotext',
        'apptitle',
        'language_id',
        'font_id',
        'country_id',
        'timezone_id',
        'logo',
        'favicone',
    ];
}
