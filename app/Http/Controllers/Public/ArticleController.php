<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        return view('public.articles.index')->with([
            'items' => YoutubeVideo::query()->get()
        ]);
    }

    public function show($id)
    {
        return view('public.articles.show')->with([
            'video' => YoutubeVideo::query()->where('id',$id)->first()
        ]);
    }
}
