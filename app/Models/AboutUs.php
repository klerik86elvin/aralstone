<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class AboutUs extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, HasTranslations;

    protected $table = 'about_us';
    public $translatable = ['text','contacts'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();
    }
}
