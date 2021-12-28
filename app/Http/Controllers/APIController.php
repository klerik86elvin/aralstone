<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Location;
use App\Models\Product;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getLocations()
    {
        $locations = Location::all();
        return response()->json($locations, 200);
    }

    public function searchProduct(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->value.'%')->get();
        $view = view('products-data', compact('products'))->render();
        return response()->json(['html' => $view]);
    }

    public function getProductsByCategoryID($id)
    {
        $category = Category::findOrFail($id);

        return response()->json($category->products()) ;
    }
}
