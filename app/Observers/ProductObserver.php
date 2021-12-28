<?php

namespace App\Observers;

use App\Models\Product;
use Intervention\Image\Facades\Image;

class ProductObserver
{
    public function created(Product $product)
    {

    }

    public function updated(Product $product)
    {
        $product->unsetEventDispatcher();
//        if (strcmp($product->getTranslation('applying', 'en'), $product->getTranslation('applying', 'ru')) == 0)
//        {
//            $product->setTranslation('applying', 'en', ' ');
//            $product->setTranslation('applying', 'ru', ' ');
//            $product->save();
//        }

    }
}
