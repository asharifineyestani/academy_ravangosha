<?php

use \Illuminate\Support\Facades\Auth;


function calculateDurationCourse($course)
{
    $sum = 0;
    foreach ($course->arvanVideos as $video) {
        $sum += $video->duration;
    }
    return floor($sum / 3600) . gmdate(":i:s", $sum % 3600);
}

function getStudyTime($str)
{
    $word = explode(' ', $str);
    return round(count($word) / 160);
}
function getPath($url)
{

    return str_replace('http://elmokar.com', '', $url);
}


function canReLogin($request): bool
{
    $session_reLogin = $request->session()->get('reLoginToken');

    $cookie_reLogin = $request->cookie('reLoginToken');

    return ($session_reLogin == $cookie_reLogin);
}


function getUserRole(): string
{


    if (Auth::guest())
        $role = 'student';
    elseif (Auth::user()->hasRole('admin'))
        $role = 'admin';
    elseif (Auth::user()->hasRole('instructor'))
        $role = 'instructor';
    else
        $role = 'student';

    return $role;
}

function excerpt($title, $cutOffLength = 120): string
{

    $charAtPosition = "";
    $titleLength = strlen($title);

    do {
        $cutOffLength++;
        $charAtPosition = substr($title, $cutOffLength, 1);
    } while ($cutOffLength < $titleLength && $charAtPosition != " ");

    return substr($title, 0, $cutOffLength) . '...';

}



function getRedirectPathAfterPayment(): string
{

    return '/' . getUserRole() . '/wallet';
}

function canIWatchThisVideo($video)
{

    if (\Illuminate\Support\Facades\Auth::guest())
        return false;

    return $video->course->enrolled;

}


function getDurationVideo($path)
{
    $full_video_path = public_path($path);
    $getID3 = new getID3();
    $file = $getID3->analyze($full_video_path);

    return $file['playtime_seconds'] ?? 0;
}


function roundStar($number)
{
    return round($number / 5, 1) * 5;
}


function toggleTopic($topic, $videoId)
{

    $videoIds = $topic->videos->pluck('id')->toArray();

    if (in_array($videoId, $videoIds))
        return 'show';

}


function toggleVideo($video, $videoId)
{
    if ($video->id == $videoId)
        return 'btn-success-soft';

    return 'btn-danger-soft';
}



function getAuthors($limit)
{
    return \App\Models\Author::query()->limit($limit)->get();
}


function getCategories($limit)
{
    return \App\Models\Category::query()->limit($limit)->get();
}


function getAuthorById($id)
{
    $author =  \App\Models\Author::query()->where('id',$id)->first();

    if($author)
        return $author->name;
}


function getCategoryById($id)
{
    $category =  \App\Models\Category::query()->where('id',$id)->first();

    if($category)
        return $category->title;
}
