<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //

    public function index()
    {
        return view('public.videos.index');
    }

    public function show()
    {
        return view('public.videos.show');
    }
}
