<?php

namespace App\Http\Livewire\Student\Tasks;

use App\Models\ArvanVideo;
use App\Models\Image;
use App\Models\Task;
use App\Models\TaskAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Show extends Component
{
    use WithFileUploads;

    protected $listeners = ['refreshAnswers'];
    public $heading = 'تکالیف';
    public $video;
    public $editable = true;
    public $media;
    public $images = [];
    public $message;
    public $viewMode = false;
    public $task;
    public $answer = [];
    public $answers;
    public $selectedAnswer;

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
            'answer.body' => ['required', 'string'],
            'images.*' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        ]);


//        foreach ($this->images as $key => $image) {
//
//            $this->images[$key] = $image->store('images');
//        }

//        $this->images = json_encode($this->images);
//
//
//        Image::create(['image' => $this->images]);


        if (isset($this->answer['id'])) {

            $row = TaskAnswer::query()
                ->where('id', $this->answer['id'])
                ->where('user_id', Auth::id())
                ->first();

            $row->update(['body' => $this->answer['body']]);
        } else {
            $row = TaskAnswer::query()->create($this->answer);

        }


        $this->addMedia($row);

        $this->message = 'عملیات با موفقیت انجام شد.';

        $this->emit('refreshAnswers');

        $this->editable = false;


    }

    public function addMedia($row)
    {


        foreach ($this->images as $image) {

            $row->addMedia($image)
                ->toMediaCollection();
        }
    }

    public function removeMe($index)
    {
        array_splice($this->images, $index, 1);
    }

    public function makeEditable()
    {
        $this->editable = true;

    }


    public function setItem($id)
    {
        $ans = TaskAnswer::query()->where('id', $id)->first();
        $this->answer['body'] = $ans->body;
        $this->answer['id'] = $id;

//        $this->images = $ans->getMedia();


        $this->heading = 'ویرایش پاسخ';

        $this->editable = true;

    }

    public function doAnswer()
    {
        $this->heading = 'پاسخ من';
        $this->answer = [];
        $this->images = [];
        $this->editable = true;
        $this->viewMode = false;


    }

    public function showAnswer($id)
    {
        $this->selectedAnswer = TaskAnswer::query()->where('id', $id)->first();
    }

    public function showItem($id)
    {
        $ans = TaskAnswer::query()->where('id', $id)->first();
        $this->answer['body'] = $ans->body;
        $this->heading = 'مشاهده پاسخ';
        $this->editable = true;
        $this->viewMode = true;

    }

    public function deleteItem($id)
    {

        $media = Media::query()
            ->where('model_type', TaskAnswer::class)
            ->where('model_id', $id)
            ->get();


        $media->each(function ($m) {
            $m->delete();
        });

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
        return view('livewire.student.tasks.show')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
