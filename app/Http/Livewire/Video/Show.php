<?php

namespace App\Http\Livewire\Video;

use App\Models\Course;
use App\Models\WatchLogs;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Show extends Component
{

    public $course;
    public $video;
    public $videoId;
    protected $request;


    public function mount(Request $request)
    {


        $this->request = $request;

        $videoId = $request->videoId;

        $courseId = $request->courseId;


        $this->course = Course::query()
            ->where('id', $courseId)
            ->first();

        $this->video = \App\Models\ArvanVideo::find($videoId);


        $this->videoId = $videoId;


        $this->setWatchedLog();

    }

    public function setWatchedLog()
    {

        #felan
        $percentage = 100;


        $data = [
            'user_id' => Auth::id(),
            'video_id' => $this->videoId,
            'watched_percentage' => $percentage,
        ];

        $query = WatchLogs::query()->where($data);


        $this->InsertWatchedLog($query, $data);


//        $percentage = $this->calculatePercentage($watchedTime);
//        $this->updateWatchedPercentage($query, $percentage);


    }


    public function setWatchedTime($watchedTime)
    {


        $data = [
            'user_id' => \Auth::id(),
            'video_id' => $this->videoId,

        ];

        $query = WatchLogs::query()->where($data);


        $this->InsertWatchedLog($query, $data);


        $percentage = $this->calculatePercentage($watchedTime);


        $this->updateWatchedPercentage($query, $percentage);


    }


    private function calculatePercentage($watchedTime)
    {
        $path = \App\Models\Video::find($this->videoId)->path;


        $duration = getDurationVideo($path);

        return $watchedTime / $duration * 100;
    }


    private function checkBeforeUpdate(Builder $query, $percentage): bool
    {
        return $percentage > $query->first()->watched_percentage;
    }


    private function InsertWatchedLog(Builder $query, array $data): void
    {
        if (!$query->exists())
            WatchLogs::create($data);
    }


    private function updateWatchedPercentage(Builder $query, $percentage): void
    {
        if ($this->checkBeforeUpdate($query, $percentage))
            $query->update(['watched_percentage' => $percentage]);
    }


    public function render()
    {

        $path = $this->video->video_url;

        return view('livewire.video.show')
            ->extends('layouts.eduport.master_video')
            ->section('main');
    }
}
