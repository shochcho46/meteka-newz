<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Post\Entities\Display;

class Mainmenu extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'serial',
        'status',
    ];

    public function submenus()
    {
        return $this->hasMany(Submenu::class);
    }

    public function displays()
    {
        return $this->hasMany(Display::class);
    }

}
