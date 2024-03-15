<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SuggestedCourses extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $courses;
    public $heading;
    public $description;

    public function __construct()
    {
        //

        $this->courses = \App\Models\Course::limit(12)->get();
        $this->heading =  __('static.heading.suggestedCourses');
        $this->description = __('static.description.suggestedCourses');

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.suggested-courses');
    }
}
