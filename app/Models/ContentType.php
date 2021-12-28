<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class ContentType extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    public $translatable = ['name'];
     protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function contents()
    {
        return $this->hasMany(Content::class,'content_type_id','id');
    }


}
