<?php

namespace App\Http\Livewire\Student\Tasks;

use App\Models\ArvanVideo;
use App\Models\Task;
use App\Models\TaskAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Answer extends Component
{
    use WithFileUploads;

    protected $listeners = ['refreshAnswers'];
    public $heading = 'ثبت پاسخ';
    public $video;
    public $editable = true;
    public $media;
    public $message;
    public $viewMode = false;
    public $task;
    public $answer = [];
    public $answers;

    public function mount($taskId)
    {
        $this->task = Task::query()->find($taskId);

        $this->answers = $this->getAnswers($taskId);
    }

    public function createOrUpdateAnswer()
    {
        $this->answer['task_id'] = $this->task->id;
        $this->answer['user_id'] = Auth::id();

        $this->validate([
            'answer.body' => ['required', 'string']
        ]);

        if (isset($this->answer['id'])) {
            TaskAnswer::query()
                ->where('id', $this->answer['id'])
                ->where('user_id', Auth::id())
                ->update(['body' => $this->answer['body']]);
        } else {
            $new = TaskAnswer::query()->create($this->answer);

            if ($this->file)
                $new
                    ->addMedia($this->file)
                    ->toMediaCollection();
        }


        $this->message = 'عملیات با موفقیت انجام شد.';

        $this->emit('refreshAnswers');

        $this->editable = false;


    }

    public function makeEditable()
    {
        $this->editable = true;

    }


    public function setItem($id)
    {
        $this->answer['body'] = TaskAnswer::query()->where('id', $id)->first()->body;
        $this->answer['id'] = $id;

        $this->heading = 'ویرایش پاسخ';

        $this->editable = true;

    }

    public function doAnswer()
    {
        $this->heading = 'پاسخ من';
        $this->answer = [];
        $this->editable = true;
        $this->viewMode = false;


    }

    public function showItem($id)
    {
        $this->answer['body'] = TaskAnswer::query()->where('id', $id)->first()->body;
        $this->heading = 'مشاهده پاسخ';
        $this->editable = true;
        $this->viewMode = true;

    }

    public function deleteItem($id)
    {
        TaskAnswer::query()->where('id', $id)->delete();

        $this->message = 'رکورد با موفقیت حذف شد.';

        $this->emit('refreshAnswers');
    }


    public function refreshAnswers()
    {
        $this->answers = $this->getAnswers($this->task->id);
    }


    public function getAnswers($id)
    {
        return Task::query()
            ->where('id', $id)
            ->first()
            ->answers()
            ->orderBy('id', 'Desc')
            ->get();
    }


    public function render()
    {
        return view('livewire.student.tasks.answer')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
