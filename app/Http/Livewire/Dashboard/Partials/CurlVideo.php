<?php

namespace App\Http\Livewire\Dashboard\Partials;

use App\Http\Controllers\Arvan\VideoCurl;
use App\Models\Course;
use Livewire\Component;

class CurlVideo extends Component
{
    public $course;
    public $message = null;
    public $enableInput = false;
    public $videoId;


    public function mount($courseId)
    {
        $this->course = Course::query()->find($courseId);
    }

    public function toggleEnableInput()
    {
        $this->enableInput = !$this->enableInput;
        $this->message = null;
    }


    public function curlVideo()
    {
        $this->toggleEnableInput();
        $curl = new VideoCurl();
        $this->message = $curl->createOrUpdateVideo($this->course->channel_id , $this->videoId);

    }





    public function render()
    {
        return view('livewire.dashboard.partials.curl-video');
    }
}
