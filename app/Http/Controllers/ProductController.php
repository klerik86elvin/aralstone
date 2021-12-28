<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request)
    {
        $categories = Category::all();
        $products = Product::where('is_stock', true)->paginate(30);
        if ($request->ajax())
        {
            $view = view('products-data', compact('products'))->render();
            return response()->json(['html' => $view]);
        }
        //return $products;
        return view('products', ['categories' => $categories, 'products' => $products]);
    }

    public function getByCategory($id, Request $request)
    {
        $category = Category::with('products')->find($id);
        $categories = Category::all();
        $products = $category->products()->paginate(30);
        if ($request->ajax())
        {
            $view = view('products-data', compact('products'))->render();
            return response()->json(['html' => $view]);
        }
        //return $products;
        return view('products', ['categories' => $categories, 'products' => $products]);
    }

    public function inner($id)
    {
        $product = Product::find($id);
//        return $product->getTranslations('text', 'en', false);
//        return $product;
//        return strcmp($product->getTranslation('applying', 'en'), $product->getTranslation('applying', 'ru'));
        $products = Product::where('is_stock',true)->take(5)->get();
        $category = $product->category->name;
        //return $category;

        return view('product-inner', ['product' => $product, 'products' => $products, 'category' => $category]);
    }
}
