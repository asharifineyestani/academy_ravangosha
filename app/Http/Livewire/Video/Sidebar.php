<?php

namespace App\Http\Livewire\Video;

use Livewire\Component;

class Sidebar extends Component
{
    public $video;

    public function mount($video = null)
    {
        $this->video = $video;
    }

    public function render()
    {

        return view('livewire.video.sidebar');
    }
}
