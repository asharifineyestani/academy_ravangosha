<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Students extends Component
{

    protected $listeners = ['getItems'];


    public $items = [];


    public $resultTest;


    public function mount()
    {
        $this->items = $this->getItems();
    }

    public function getItems()
    {
        return User::query()
            ->doesntHave('roles')
            ->get();

    }


    public function render()
    {
        return view('livewire.admin.users.index')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
