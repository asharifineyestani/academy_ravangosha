<?php

namespace App\Http\Livewire\Instructor\Courses;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = ['refreshCourses'];


    public $items = [];


    public $resultTest;


    public function mount()
    {
        $this->items = $this->getCourses();
    }

    public function getCourses()
    {
        return Course::query()->where('author_id', Auth::id())->get();

    }


    public function render()
    {
//        return view('livewire.management.courses.index');
        return view('livewire.instructor.courses.index')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
