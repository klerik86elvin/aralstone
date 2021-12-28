<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Product extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [];
//        return [
//            'id' => $this->id,
//            'name' => $this->name,
//            'price' => (float) $this->price,
//            'sub_category' => $this->subCategory->name,
//            'image' => $this->getFirstMediaUrl('main'),
//        ];
    }
}
