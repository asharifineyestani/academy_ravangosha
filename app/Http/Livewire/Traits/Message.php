<?php

namespace App\Http\Livewire\Traits;

trait Message
{

    public $formMessage = null;

    public function clearFormMessage()
    {
        $this->formMessage = null;

    }

    public function setFormMessage($message)
    {
        $this->formMessage = $message;
    }

}
