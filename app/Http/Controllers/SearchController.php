<?php

namespace App\Http\Controllers;

use App\Models\ContentType;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $products = Product::where([['name', 'LIKE', '%'.$request->result.'%'], ['is_stock', '=', true]])
            ->orWhere('composition', 'LIKE', '%'.$request->result.'%')
            ->orWhere('company_name', 'LIKE', '%'.$request->result.'%')
            ->get();

        $contentTypes = ContentType::with(['contents' => function($query) use($request) {
            $query->where('title', 'LIKE', '%'.$request->result.'%')
                ->orWhere('name', 'LIKE', '%'.$request->result.'%');
        }])->get();
        return view('search-result', ['products' => $products, 'contentType' => $contentTypes]);
    }
}
