<?php

namespace App\Http\Livewire\Instructor\Tasks;

use App\Models\ArvanVideo;
use App\Models\Task;
use Illuminate\Http\Request;
use Livewire\Component;

class Create extends Component
{
    protected $listeners = ['refreshItems'];
    public $message = null;
    public $editable = false;
    public $heading = 'افزودن تکلیف';
    public $task = [];
    public $items;
    public $videoId;
    public $video;


    public function makeEditable()
    {
        $this->heading = 'افزودن تکلیف';
        $this->editable = true;
        $this->task = ['video_id' => $this->videoId];
        $this->items = $this->getItems($this->videoId);
    }

    public function mount($videoId)
    {
        $this->task['video_id'] = $videoId;
        $this->videoId = $videoId;
        $this->video = ArvanVideo::find($videoId);


        $this->items = $this->getItems($videoId);

    }

    public function getItems($videoId)
    {
        return Task::query()->where('video_id', $videoId)->orderBy('id', 'Desc')->get();
    }


    public function setItem($id)
    {
        $this->task['body'] = Task::query()->where('id', $id)->first()->body;
        $this->task['id'] = $id;

        $this->heading = 'ویرایش تکلیف';

        $this->editable = true;

    }

    public function deleteItem($id)
    {
        Task::query()->where('id', $id)->delete();

        $this->message = 'رکورد با موفقیت حذف شد.';

        $this->emit('refreshItems');
    }

    public function toggleEditable()
    {
        $this->editable = !$this->editable;
    }


    public function refreshItems()
    {
        $this->items = $this->getItems($this->videoId);
    }

    public function createOrUpdateTask()
    {
        $this->validate([
            'task.body' => ['required', 'string']
        ]);

        if (isset($this->task['id']))
            Task::query()->where('id', $this->task['id'])->update($this->task);
        else
            Task::query()->create($this->task);

        $this->message = 'عملیات با موفقیت انجام شد.';

        $this->emit('refreshItems');


        $this->editable = false;


    }

    public function render()
    {
        return view('livewire.instructor.tasks.create')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
