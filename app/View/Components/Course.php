<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Course extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $courses;
    public function __construct()
    {
        //

        $this->courses = \App\Models\Course::query()
        ->with('author')->limit(3)->isPriced()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.course');
    }
}
