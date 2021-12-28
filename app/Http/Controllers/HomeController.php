<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContentType;
use App\Models\Portner;
use App\Models\Slider;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $selectedCategory = Category::with(['products'])->firstOrFail();
        $partners = Portner::all();
        $slider = Slider::all();
        $contents = ContentType::with('contents')->first();
        $banners = Banner::latest()->take(2)->get();
        return view('index', ['categories' => $categories, 'selectedCategory' => $selectedCategory, 'partners' => $partners, 'slider' => $slider, 'contents' => $contents, 'banners' => $banners]);
    }
}
