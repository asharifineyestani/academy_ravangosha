<?php

namespace App\Http\Livewire\Instructor\Videos;

use App\Models\ArvanVideo;
use App\Models\Course;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use function view;

class Index extends Component
{


    use LivewireAlert;

    public $videoIdForDelete;

    protected $listeners = [
        'refreshVideos',
        'confirmedDeleteVideo'
        ];

    public $items = [];
    public $count = 0;
    public $resultTest;
    public $courseId;
    public $sortNumber;







    public function deleteVideo($videoId)
    {
        $this->videoIdForDelete = $videoId;

        $this->alert('question', 'آیا از حذف این رکورد مطمین هستید؟', [
            'onConfirmed' => 'confirmedDeleteVideo',
            'position' => 'center',
            'timer' => '9000',
            'toast' => false,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
            'showDenyButton' => false,
            'showCancelButton' => true,
            'cancelButtonText' => 'لغو',
            'confirmButtonText' => 'بله',
        ]);

    }


    public function confirmedDeleteVideo()
    {
        ArvanVideo::query()->where('id', $this->videoIdForDelete)->delete();
        $this->emit('refreshVideos');
    }



    public function updateSortNumber($videoId)
    {


        $course = Course::where('id', $this->courseId)->first();

        $videos = $course->arvanVideos()->orderBy('sort_number', 'Asc')
            ->where('sort_number', '>=', $this->sortNumber)->get();

        foreach ($videos as $video) {
            $video->increment('sort_number');
        }

        ArvanVideo::query()->where('id', $videoId)->update([
            'sort_number' => $this->sortNumber
        ]);


        $this->emit('refreshVideos');


    }


    public function sortVideos()
    {

        $videos = $this->items;

        $i = 1;

        foreach ($videos as $video) {
            $video->update(['sort_number' => $i++]);
        }


    }

    public function mount(Request $request)
    {

        $this->courseId = $request->courseId;

        $this->items = $this->getVideos();

        $this->sortVideos();

    }

    public function getVideos()
    {

        $course = Course::where('id', $this->courseId)->first();

        return $course->arvanVideos()->orderBy('sort_number', 'Asc')->get();
    }


    public function refreshVideos()
    {
        $this->items = $this->getVideos();

    }


    public function render()
    {
        $this->sortNumber = null;
//        return view('livewire.management.videos.index')
        return view('livewire.instructor.videos.index')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');;
    }


}
