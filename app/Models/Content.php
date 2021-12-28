<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Content extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia, SoftDeletes, HasTranslations;

    protected $table = 'content';

    public $translatable = ['name', 'title', 'text'];


     protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function contentType()
    {
        return $this->belongsTo(ContentType::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();
    }
}
