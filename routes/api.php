<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('category/{category}', function (\App\Models\Category $category){
    return response()->json($category->with('products')->findOrFail($category->id));
})->name('category.main');

Route::get('sub-category/{subCategory}', function (\App\Models\SubCategory $subCategory){
    //return \App\Models\Product::all();
    return response()->json($subCategory->with(['products', 'products.subCategory'])->find($subCategory->id));
});
Route::get('categories', function () {
    $all = \App\Models\Category::all();
    return $all;
});

Route::get('product/{product}', function (\App\Models\Product $product) {
    return response()->json($product);
});
Route::get('category/{category}/products', function (\App\Models\Category $category) {
    $data = $category->with('products')->find($category->id);
    $products = $data->products;
    $view = view('products-data', compact('products'))->render();
    return response()->json(['html' => $view]);
});

Route::get('locations', [\App\Http\Controllers\APIController::class, 'getLocations']);
Route::get('products/search', [\App\Http\Controllers\APIController::class, 'searchProduct']);
