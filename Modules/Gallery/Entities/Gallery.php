<?php

namespace Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Gallery\Entities\Albam;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\Image\Enums\Fit;

class Gallery extends Model implements HasMedia
{
    use HasFactory, SoftDeletes,InteractsWithMedia;

    protected $fillable = [
        'id',
        'albam_id',
        'filename',
        'location',
        'caption',
        'created_by',
        'update_by',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        if ($media->extension != 'webp') {
            $this
                  ->addMediaConversion('webp_format')
                  ->format('webp')
                  ->performOnCollections('gallery')
                  ->fit(Fit::Crop, 1920, 1080)
                  ->sharpen(10)
                  ->quality(80)
                  ->nonQueued() ;
        }
        else {
          $this ->addMediaConversion('webp_format')
                  ->performOnCollections('gallery')
                  ->fit(Fit::Crop, 1920, 1080)
                  ->sharpen(10)
                  ->quality(80)
                  ->nonQueued() ;
        }
    }

    public function albam()
    {
        return $this->belongsTo(Albam::class);
    }
}
