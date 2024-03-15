<?php

namespace App\View\Components;

use App\Models\Video;
use Illuminate\View\Component;
use \Illuminate\Support\Facades\Auth;

class ArvanVideoItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    public $video;
    public $item;

    public function __construct($video)
    {
        //
        $this->video = $video;

        $this->item = new \stdClass();

        $this->setItem();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.video-item');
    }


    public function setItem()
    {


        if (canIWatchThisVideo($this->video)) {


            $this->item->icon = 'fas fa-play';
            $this->item->href = '/cloud/videos/' . $this->video->id;
//            $this->item->href = '/courses/' ;

            if ($this->video->watched) {
                $this->item->label = 'دوباره ببینید';
                $this->item->class = 'btn-primary';
                $this->item->classPlay = 'btn-primary-soft';
            } else {
                $this->item->label = 'تماشا';
                $this->item->class = 'btn-success';
                $this->item->classPlay = 'btn-success-soft';
            }


        } else {

            $this->item->icon = 'fas fa-lock';

            if ($this->video->is_free) {
                $this->item->icon = 'fas fa-play';
                $this->item->label = 'رایگان ببینید';
                $this->item->class = 'btn-danger';
                $this->item->classPlay = 'btn-danger-soft';
//                $this->item->href = '/courses/' . $this->video->topic->course_id . '/videos/' . $this->video->id;
                $this->item->href = '/cloud/videos/' . $this->video->id;
            } else {
                $this->item->label = 'نیاز به ثبت نام';
                $this->item->class = 'btn-light';
                $this->item->classPlay = 'btn-light';
                $this->item->href = '/cloud/videos/' . $this->video->id;
                $this->item->href = '/courses/' . $this->video->course->id . '/enroll/';
            }


        }


    }


}
