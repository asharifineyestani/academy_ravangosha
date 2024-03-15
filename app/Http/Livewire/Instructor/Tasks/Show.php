<?php

namespace App\Http\Livewire\Instructor\Tasks;

use App\Models\ArvanVideo;
use App\Models\Task;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['refreshAnswers'];
    public $message = null;
    public $editable = false;
    public $heading = 'افزودن تکلیف';
    public $task = [];
    public $answers;
    public $videoId;
    public $video;


    public function mount($taskId)
    {
        $this->task = Task::query()->find($taskId);
        $this->answers = $this->task->answers()->get();
    }


    public function makeEditable()
    {


    }




    public function setItem($id)
    {


    }

    public function deleteItem($id)
    {

    }




    public function refreshAnswers()
    {
        $this->answers = $this->task->answers()->get();
    }

    public function createOrUpdateTask()
    {



    }

    public function render()
    {
        return view('livewire.instructor.tasks.show')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
