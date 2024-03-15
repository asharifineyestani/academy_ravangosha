<?php

namespace App\View\Components;

use App\Models\Feedback;
use App\Models\Instructor;
use Illuminate\View\Component;

class Feedbacks extends Component
{
    public $feedback1;
    public $feedback2;
    public $instructors;


    public function __construct()
    {
        //

        $this->feedback1 = Feedback::query()->where('id',1)->first();
        $this->feedback2 = Feedback::query()->where('id',3)->first();
        $this->instructors = Instructor::query()->limit(3)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.feedbacks');
    }
}
