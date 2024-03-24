<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        return view('public.articles.index')->with([
            'items' => Article::query()->get()
        ]);
    }

    public function show($id)
    {
        $related_articles = Article::query()->limit(3)->get();

        return view('public.articles.show')->with([
            'item' => Article::query()->where('id',$id)->first(),
            'related_articles'=>$related_articles
        ]);
    }
}
