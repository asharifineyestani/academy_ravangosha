<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function show($id)
    {
        $item = Post::query()->where('id',$id)->first();

        return view('posts.show', compact('item'));

    }

    public function index(Request $request)
    {
        $items = Post::query()->paginate(8);
        return view('posts.index',compact('items'));

    }
}
