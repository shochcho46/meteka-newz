<?php

namespace Modules\Post\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\Image\Enums\Fit;
use Illuminate\Support\Str;

class Post extends Model implements HasMedia
{
    use HasFactory, SoftDeletes,InteractsWithMedia;

    protected $fillable = [
        'id',
        'subhead',
        'head',
        'detail',
        'imgloc',
        'caption',
        'view',
        'author',
        'date',
        'created_by',
        'update_by',
        'slug',
    ];



    public function registerMediaConversions(Media $media = null): void
  {
      if ($media->extension != 'webp') {
          $this
                ->addMediaConversion('webp_format')
                ->format('webp')
                ->performOnCollections('postpic')
                ->fit(Fit::Crop, 1920, 1080)
                ->sharpen(10)
                ->quality(80)
                ->nonQueued() ;
      }
      else {
        $this ->addMediaConversion('webp_format')
                ->performOnCollections('postpic')
                ->fit(Fit::Crop, 1920, 1080)
                ->sharpen(10)
                ->quality(80)
                ->nonQueued() ;
      }
  }

  protected static function booted()
  {
      static::created(function ($post) {
          $post->slug = Str::slug($post->head) . '-' . $post->id;
          $post->save();
      });

      static::updated(function ($post) {
        if ($post->isDirty('head')) {
            $post->slug = Str::slug($post->head) . '-' . $post->id;
            $post->saveQuietly();
        }
    });
  }

    public function displays()
    {
        return $this->hasMany(Display::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }


}
