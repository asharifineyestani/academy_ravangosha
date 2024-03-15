<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function show($slug)
    {
        $viewName = 'pages/' . $slug;
        $item = Page::where('slug', $slug)->first();



        return view($viewName, compact('item'));
    }
}
