<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Concerns\HasEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia, SoftDeletes, HasTranslations;
    protected $guarded = [];
    protected $appends = ['image'];
    protected $with = ['category'];

    public $translatable = ['name', 'company_name', 'composition', 'country_name', 'pack', 'text', 'applying', 'advantage', 'safety_regulations', 'pests', 'gobelekler', 'yabani_otlar'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();
    }

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('main');
    }

//    public function getCategoryAttribute()
//    {
//        return $this->category->name;
//    }
}
