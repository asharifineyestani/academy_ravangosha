<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Topic;
use App\Models\WatchLogs;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Video extends Component
{
    public $course;
    public $video;
    public $videoId;
    protected $request;


    public function mount($request)
    {
        $this->request = $request;

        $videoId = $request->videoId;

        $courseId = $request->courseId;


        $this->course = Course::query()
            ->where('id', $courseId)
            ->first();

        $this->video = \App\Models\Video::query()
            ->where('id', $videoId)
            ->first();


        $this->videoId = $videoId;

    }


    public function render()
    {
        $path = $this->video->path;


        $duration = getDurationVideo($path);


        return view('livewire.video.show');
    }


    public function setWatchedTime($watchedTime)
    {

        $data = [
            'user_id' => \Auth::id(),
            'video_id' => $this->videoId
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
}
