<?php

use App\Models\ContentType;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('main');
Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, Config::get('app.locales'))) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});
Route::get('/about-us', function (){
    $data = \App\Models\AboutUs::latest()->first();
//    return $data->text;
    return view('about', ['data'=>$data]);
});
Route::get('/contact', [\App\Http\Controllers\ContactUsController::class, 'get']);
Route::post('/contact', [\App\Http\Controllers\ContactUsController::class, 'post']);

Route::post('order', [\App\Http\Controllers\OrderController::class, 'post']);

Route::get('/sale-points', function (){
    $cities = \App\Models\City::all();
    return view('sale-points',['cities' => $cities]);
});
Route::get('/content-type/{id}', [\App\Http\Controllers\ContentController::class, 'show'])->name('content-type');
Route::get('/content/{content}', [\App\Http\Controllers\ContentController::class, 'contentInner'])->name('content-show');
Route::get('/media', [\App\Http\Controllers\GalleryController::class, 'show'])->name('gallery');


Route::get('/products', [\App\Http\Controllers\ProductController::class, 'all'])->name('products');
Route::get('/products/{id}', [\App\Http\Controllers\ProductController::class, 'inner'])->name('product');
Route::get('/categories/{id}', [\App\Http\Controllers\ProductController::class, 'getByCategory'])->name('category');

Route::get('/search', [\App\Http\Controllers\SearchController::class, 'show'])->name('search');

Route::get('azergubre', function (){
    return redirect('https://azergubre.az/assets/images/kataloq.pdf');
});

Route::get('katalog', function (){
    $contents = ContentType::all();
    return view('katalog', ['contents' => $contents]);

});

Route::get('clen', function (){

    $products = \App\Models\Product::all();
    foreach ($products as $product) {
        $product->setTranslation('yabani_otlar', 'en', ' ');
        $product->setTranslation('yabani_otlar', 'ru', ' ');
        $product->save();
    }


//    $product = \App\Models\Product::find(1);
//    return $product->getTranslation('text','en', false);

});
