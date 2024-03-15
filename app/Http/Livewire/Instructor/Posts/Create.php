<?php

namespace App\Http\Livewire\Instructor\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{

    public $newPost = [];
    public $category = [];
    public $heading = 'افزودن نوشته';
    public $message = null;
    public $links;

    public string $renderPath = 'livewire.instructor.posts.create';


    public function setLinks()
    {
        $this->links = [
            'create' => '/instructor/posts/create',
            'index' => '/instructor/posts/',
        ];
    }


    public function mount($postId = null)
    {
        if ($postId) {
            $this->newPost = Post::where('id', $postId)->first()->toArray();
        }

        $this->setLinks();
    }


    public function store()
    {
        $this->validate([
            'newPost.title' => 'required',
            'newPost.body' => 'required',
        ]);

        $this->newPost['user_id'] = Auth::id();
        $this->newPost['category_id'] = $this->category['value'] ?? null;
        $this->newPost['study_time'] = getStudyTime($this->newPost['body']);


        if ( isset($this->newPost['id']) AND Post::find($this->newPost['id'])) {
            Post::query()->where('id', $this->newPost['id'])->update([
                'title' => $this->newPost['title'],
                'body' => $this->newPost['body'],
            ]);
        } else {
            Post::create($this->newPost);
        }


        $this->message = 'عملیات با موفقیت انجام شد.';


    }

    public function render()
    {
        return view('livewire.dashboard.crud.create')
            ->extends('layouts.eduport.master_medium')
            ->section('main');
    }
}
