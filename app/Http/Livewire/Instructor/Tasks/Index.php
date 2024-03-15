<?php

namespace App\Http\Livewire\Instructor\Tasks;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{

    public $heading = 'تکالیف';


    protected $listeners = ['refreshTasks'];


    public $items = [];


    public $resultTest;


    private $query;

    public $openedTasksCount;


    public function mount()
    {
        $userId = Auth::id();
        $this->query = Task::query()->orderBy('id', 'Desc');
        $this->items = $this->getTasks();
        $this->openedTasksCount =  $this->query->whereDoesntHave('answers', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();
    }

    public function getTasks()
    {

        return $this->query->get();

    }


    public function render()
    {
        return view('livewire.instructor.tasks.index')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
