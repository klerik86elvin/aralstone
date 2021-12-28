<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentType;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function show($id)
    {
        $content = ContentType::with('contents')->findOrFail($id);
        $contents = ContentType::all();
        return view('content', ['content' => $content, 'contents' => $contents]);
    }

    public function contentInner(Content $content) {
        $contents = $content->contentType()->with('contents')->get()[0]->contents()->get();
        $types = ContentType::all();
        return view('content-inner',compact('content','contents','types'));
    }

}
