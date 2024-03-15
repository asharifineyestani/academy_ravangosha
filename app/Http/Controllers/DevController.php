<?php

namespace App\Http\Controllers;


use App\Http\Classes\WhiteSms;
use App\Http\Livewire\ArvanVideo;
use App\Models\Course;
use App\Models\SmsSentLog;
use App\Models\SmsTemplate;
use Cryptommer\Smsir\Classes\Smsir;
use Illuminate\Http\Request;
use  \App\Models\Video;

class DevController extends Controller
{
    //

    public function sendSmsClass()
    {



//        $sms = new WhiteSms();
//        $sms->setMobile('09189872097');
//        $sms->setId(886958);
//        $sms->setParam('N', 'زهرا بیگی');
//        $sms->setParam('C', 'آموزش فریم ورک بوت استرپ');
//        $sms->send();
//
//        $sms = new WhiteSms();
//        $sms->setMobile('09183636043');
//        $sms->setId(886958);
//        $sms->setParam('N', 'جواد اکبری');
//        $sms->setParam('C', 'آموزش فریم ورک بوت استرپ');
//        $sms->send();

//
//        $sms = new WhiteSms();
//        $sms->setMobile('09186424052');
//        $sms->setId(820649);
//        $sms->setParam('N', 'فاطمه مظفری');
//        $sms->setParam('T', '20:00');
//        $sms->setParam('C', 'آموزش زبان SQL');
//        $sms->send();
//
//
//        $sms = new WhiteSms();
//        $sms->setMobile('09183684070');
//        $sms->setId(820649);
//        $sms->setParam('N', 'مجید صالحی');
//        $sms->setParam('T', '20:00');
//        $sms->setParam('C', 'آموزش زبان SQL');
//        $sms->send();
//
//
//        $sms = new WhiteSms();
//        $sms->setMobile('09021602551');
//        $sms->setId(820649);
//        $sms->setParam('N', 'علی فیروزی');
//        $sms->setParam('T', '20:00');
//        $sms->setParam('C', 'آموزش زبان SQL');
//        $sms->send();
//
//
//        $sms = new WhiteSms();
//        $sms->setMobile('09186006366');
//        $sms->setId(820649);
//        $sms->setParam('N', 'احمدرضا آذرنیاد');
//        $sms->setParam('T', '20:00');
//        $sms->setParam('C', 'آموزش زبان SQL');
//        $sms->send();
//
//


    }

    public function setVideoDuration()
    {
        $videos = Video::get();
        $getID3 = new \getID3;

        foreach ($videos as $video) {

            $videoPath = public_path($video->path);

            if (!file_exists($videoPath)) {
                Video::find($video->id)->update(['duration' => -1]);
                continue;
            }


            $file = $getID3->analyze($videoPath);

            $H = date('H', $file['playtime_seconds']);
            $i = date('i', $file['playtime_seconds']);
            $s = date('s', $file['playtime_seconds']);

            $duration = $H * 3600 + $i * 60 + $s;

            Video::find($video->id)->update(['duration' => $duration]);
        }


    }


    public function openedTasks()
    {

        $tasks_completed_for_course = Course::query()->find(3)->tasks()->whereHas('answers', function ($query) {
            $query->where('user_id', 2);
        })->get();

        return $tasks_dosnt_completed_for_course = Course::query()->find(3)->tasks()->whereDoesntHave('answers', function ($query) {
            $query->where('user_id', 2);
        })->get();
    }
}
