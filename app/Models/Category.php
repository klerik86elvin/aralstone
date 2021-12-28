<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    public $translatable = ['name'];
//    protected $with = ['products'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
