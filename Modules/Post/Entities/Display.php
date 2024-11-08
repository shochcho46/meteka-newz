<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Menu\Entities\Mainmenu;
use Modules\Menu\Entities\Submenu;

class Display extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'id',
        'post_id',
        'mainmenu_id',
        'submenu_id',
        'status',
        'view',
        'is_headline',
        'is_fbcomment',
        'is_scroll',

    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function mainmenu()
    {
        return $this->belongsTo(Mainmenu::class);
    }

    public function submenu()
    {
        return $this->belongsTo(Submenu::class);
    }

}
