<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Slider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;
    protected $table = 'slider';

    public $translatable = ['title', 'url', 'text'];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();
    }
}
