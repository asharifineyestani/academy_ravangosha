<?php

namespace App\Http\Livewire\Student\Tasks;

use App\Models\Course;
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


    public $filterId ;

    public $filters = [
        'ALL' => 'همه',
        'OPEN' => 'انجام نشده',
        'ANSWER' => 'انجام شده',
    ];


    public function setFilter($value)
    {
        $userId = Auth::id();
        $this->query = Task::query();

        $this->filterId = $value;

        switch ($this->filterId) {
            case 'OPEN':
                $this->items = $this->query->isMine()->whereDoesntHave('answers', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })->get();
            break;

            case 'ALL':
                $this->items = $this->query->isMine()->get();
                break;

            case 'ANSWER':
                $this->items = $this->query->isMine()->whereHas('answers', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                })->get();
                break;

        }


    }


    public function mount()
    {
        $userId = Auth::id();
        $this->query = Task::query()->orderBy('id', 'Desc')->isMine();
        $this->items = $this->getTasks();
        $this->openedTasksCount = $this->query->whereDoesntHave('answers', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->count();
    }

    public function getTasks()
    {

        return $this->query->get();

    }


    public function render()
    {
        return view('livewire.student.tasks.index')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
