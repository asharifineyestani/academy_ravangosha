<?php

namespace App\Http\Livewire\Video;

use Livewire\Component;

class Item extends Component
{

    public $video;
    public $currentVideoId;
    public $item = [];

    public function mount($video, $currentVideoId){


        $this->item = new \stdClass();

        $this->currentVideoId = $currentVideoId;

        $this->setItem();
    }
    public function render()
    {
        return view('livewire.video.item');
    }

    public function setItem()
    {
        $item = new \stdClass();

        if (canIWatchThisVideo($this->video)) {


            $item->icon = 'fas fa-play';
            $item->href = '/cloud/videos/' . $this->video->id;

            if ($this->video->watched) {
                $item->label = 'دوباره ببینید';
                $item->class = 'btn-primary';
                $item->classPlay = 'btn-primary-soft';
            } else {
                $item->label = 'تماشا';
                $item->class = 'btn-success';
                $item->classPlay = 'btn-success-soft';
            }


        } else {

            $item->icon = 'fas fa-lock';

            if ($this->video->is_free) {
                $item->icon = 'fas fa-play';
                $item->label = 'رایگان ببینید';
                $item->class = 'btn-danger';
                $item->classPlay = 'btn-danger-soft';
//                $item->href = '/courses/' . $this->video->topic->course_id . '/videos/' . $this->video->id;
                $item->href = '/cloud/videos/' . $this->video->id;
            } else {
                $item->label = 'نیاز به ثبت نام';
                $item->class = 'btn-light';
                $item->classPlay = 'btn-light';
                $item->href = '/cloud/videos/' . $this->video->id;
                $item->href = '/courses/' . $this->video->course->id . '/enroll/';
            }


        }


        $this->item = (array) $item;

    }
}
