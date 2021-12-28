<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Portner extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'portners';

    public $timestamps = false;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();
    }
}
