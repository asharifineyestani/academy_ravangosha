<?php

namespace App\Http\Controllers;

use App\Models\ArvanVideo;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const UPLOAD_PATH = '/storage/uploads';


    public function cloudVideo(Request $request, $videoId)
    {


        $video = ArvanVideo::query()
            ->where('id', $videoId)
            ->first();


        return view('arvan.courses.video', compact( 'video', 'videoId', 'request'));
    }
}
