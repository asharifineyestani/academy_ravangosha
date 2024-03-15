<?php

namespace App\Http\Livewire\Dashboard\Partials;

use App\Models\User;
use Livewire\Component;

class UserInfo extends Component
{
    public $user;

    public function mount($userId)
    {
        $this->user =
            User::query()
                ->where('id', $userId)
                ->first();
    }

    public function render()
    {
        return view('livewire.dashboard.partials.user-info');
    }
}
