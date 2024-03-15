<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class Transaction extends Component
{
   public $items;
   public $title;


    public function __construct()
    {
        //
        $this->items = \Auth::user()->transactions;
        $this->title = 'تاریخچه کیف پول';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.transaction');
    }
}
