<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Instructors extends Students
{


    protected $listeners = ['getItems'];


    public $items = [];


    public $resultTest;


    public function mount()
    {
        $this->items = $this->getItems();
    }




    public function render()
    {
        return view('livewire.admin.users.index')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }

    public function getItems()
    {


        return \App\Models\User::query()
            ->hasRole('roles')
            ->get();

    }

}
