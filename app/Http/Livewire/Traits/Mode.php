<?php

namespace App\Http\Livewire\Traits;

trait Mode
{

    public $mode = null;


    public function refreshMode()
    {
        $this->mode = 'show';

    }

    public function setMode($mode)
    {
        $this->mode = $mode;

        $this->emit('refreshActiveCourseFields');

    }


}
