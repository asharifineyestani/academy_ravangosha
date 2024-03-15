<?php

namespace App\Http\Livewire\Traits;

trait Tab
{


    public $tab = 'intro';


    public function changeTab($tab)
    {
        $this->clearFormMessage();
        $this->tab = $tab;


    }

}
