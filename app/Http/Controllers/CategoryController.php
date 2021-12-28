<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showByCategory($cat_id)
    {
        $data  = Category::with(['products' => function($q){
            $q->where('products.is_stock', true);
        }])->find($cat_id);

        $products = $data->products;

        $categoryName = $data->name;

        $categories = Category::all();
        return view('products_by_category', ['products' => $products, 'categories' => $categories, 'categoryName' =>$categoryName]);
    }

    public function showBySubCategory($cat_id, $sub_id)
    {
        $category = SubCategory::with('products')->findOrFail($sub_id);
        $products = $category->products;
        return view('products', ['products'=>$products]);
    }
}
