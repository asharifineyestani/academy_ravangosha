<?php

namespace App\Http\Livewire\Instructor\Posts;

use App\Models\ArvanVideo;
use App\Models\Course;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;


    public $rowIdForDelete;

    protected $listeners = [
        'refreshPosts',
        'confirmSwatDelete'
    ];


    public $items = [];

    public $heading = 'مطالب من';


    public function sweatDelete($id)
    {
        $this->rowIdForDelete = $id;

        $this->alert('question', 'آیا از حذف این رکورد مطمین هستید؟', [
            'onConfirmed' => 'confirmSwatDelete',
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


    public function confirmSwatDelete()
    {
        Post::query()->where('id', $this->rowIdForDelete)->delete();
        $this->emit('refreshPosts');
    }

    public function refreshPosts()
    {
        $this->items = $this->getPosts();
    }


    public function mount()
    {
        $this->items = $this->getPosts();
    }

    public function getPosts()
    {
        return Post::query()->where('user_id', Auth::id())->orderBy('id','DESC')->get();

    }


    public function render()
    {
        return view('livewire.instructor.posts.index')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }

}
