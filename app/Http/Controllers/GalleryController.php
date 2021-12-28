<?php

namespace App\Http\Controllers;

use App\Models\ContentType;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function show()
    {
        $contents = ContentType::all();
        $photo = Gallery::where('type', 'photo')->get();
        $video = Gallery::where('type', 'video')->get();
        //return $photo;
        return view('gallery', ['contents' => $contents, 'photo' => $photo, 'video' => $video]);
    }
}
