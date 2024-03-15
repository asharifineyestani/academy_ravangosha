<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Star extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $star;


    public function __construct($star = 4)
    {
        $this->star = $star;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.star');
    }
}
