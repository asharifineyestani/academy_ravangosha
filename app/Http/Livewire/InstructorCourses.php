<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\Message;
use App\Http\Livewire\Traits\Mode;
use App\Http\Livewire\Traits\Tab;
use App\Http\Livewire\Traits\Course as CourseTrait;
use App\Models\Course;
use App\Models\Topic;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use \App\Models\Video;
use Livewire\WithFileUploads;

class InstructorCourses extends Component
{

    use Tab, Mode, CourseTrait, Message, WithFileUploads;


    protected $listeners = ['refreshActiveCourse', 'refreshActiveCourseFields'];


    protected $rules = [
        'activeCourseFields.title' => 'required',
        'activeCourseFields.prerequisites' => 'required',
        'activeCourseFields.excerpt' => 'required',
        'newVideoFile' => 'video|max:10000', // 1MB Max
    ];


    public $topics = [];
    public $items;
    public $refresh;
    public $step = 'table';


    public $creatingTopic = false;
    public $creatingVideo = false;
    public $editingVideo = false;

    public $newTopic = null;
    public $newVideo = [];
    public $newVideoTitle = null;
    public $newVideoPath = null;
    public $newVideoFile = null;
    public $activeTopicId = null;
    public $selectedVideo = null;

    public $selectedVideoTitle = null;
    public $selectedVideoPath = null;


    public function destroyTopic()
    {
        Topic::where('id', $this->activeTopicId)->delete();

        $this->emit('refreshActiveCourse');

    }

    public function mount()
    {

        $this->setMode('management');





        if ($this->selectedVideo) {
            $this->selectedVideoTitle = $this->selectedVideo->title;
            $this->selectedVideoPath = $this->selectedVideo->path;
        }


    }

    public function setActiveCourseNull()
    {
        $this->activeCourse = null;
        $this->step = 'table';
    }

    public function setCreatingVideoNull()
    {
        $this->creatingVideo = null;
    }

    public function setEditingVideoNull()
    {
        $this->editingVideo = null;
    }

    public function setActiveTopicId($activeTopicId)
    {
        if ($activeTopicId == $this->activeTopicId)
            $this->activeTopicId = null;

        else
            $this->activeTopicId = $activeTopicId;
    }

    public function activeCreatingTopic()
    {
        $this->creatingTopic = true;
    }


    public function activeCreatingVideo()
    {
        $this->creatingVideo = true;
    }


    public function activeEditingVideo($id)
    {
        $this->editingVideo = true;
        $this->selectedVideo = Video::find($id);
        $this->mount();
    }


    public function updateVideo()
    {
        Video::where('id', $this->selectedVideo->id)
            ->update([
                'title' => $this->selectedVideoTitle,
                'path' => $this->selectedVideoPath,
            ]);


        $this->editingVideo = false;

        $this->emit('refreshActiveCourse');
    }

    public function destroyVideo($id)
    {
        $query = Video::where('id', $id);

        $path = $query->first()->path;

        if (Storage::disk('upload')->exists($path))
            Storage::disk('upload')->delete($path);


        $query->delete();


        $this->emit('refreshActiveCourse');


    }

    public function storeTopic()
    {

        $this->newTopic['course_id'] = $this->activeCourse->id;
        Topic::create($this->newTopic);

        $this->creatingTopic = false;


        $this->emit('refreshActiveCourse');
    }


    public function storeVideo()
    {

        if ($this->newVideoPath)
            $this->newVideo['path'] = $this->newVideoPath;
        else
            $this->newVideo['path'] = $this->newVideoFile->store('videos', 'upload');

        $this->newVideo['title'] = $this->newVideoTitle;

        $this->newVideo['topic_id'] = $this->activeTopicId;
        $this->newVideo['duration'] = 0;
        Video::create($this->newVideo);
        $this->creatingVideo = false;


        $this->clearNewVideo();


        $this->emit('refreshActiveCourse');
    }

    public function clearNewVideo()
    {
        $this->newVideoTitle = null;
        $this->newVideoPath = null;


    }

    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->items = Course::where('author_id', \Auth::id())->get();
    }

    public function changeActiveCourse($id = null)
    {
        $this->activeCourse = Course::find($id);
        $this->step = 'course';
    }

    public function render()
    {

        return view('livewire.instructor-courses');
    }
}
