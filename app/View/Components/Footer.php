<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $pages;
    public $courses;
    public $packages;
    public $bottomLinks;

    public function __construct()
    {
        //

        $this->pages = Menu::query()->whereGroup('page')->limit(4)->get();
        $this->courses = \App\Models\Course::limit(4)->isPriced()->get();
        $this->packages = Menu::limit(4)->whereGroup('package')->get();
        $this->bottomLinks = Menu::whereGroup('bottom')->limit(2)->get();



    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
