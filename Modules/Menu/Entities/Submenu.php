<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Post\Entities\Display;

class Submenu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'id',
        'mainmenu_id',
        'name',
        'slug',
        'serial',
        'status',
    ];

    public function mainmenu()
    {
        return $this->belongsTo(Mainmenu::class);
    }

    public function displays()
    {
        return $this->hasMany(Display::class);
    }
}
