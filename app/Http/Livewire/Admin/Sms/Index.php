<?php

namespace App\Http\Livewire\Admin\Sms;

use App\Models\SmsLog;
use Livewire\Component;

class Index extends Component
{
    public $items;
    public $heading = 'لاگ پیامک ها';


    public function mount($mobile = null)
    {
        $this->items = $this->getItems();

        if($mobile)
            $this->items = $this->items->where('mobile', $mobile);
    }

    public function getItems()
    {
        return SmsLog::query()->orderBy('id','Desc')->get();

    }

    public function render()
    {
        return view('livewire.admin.sms.index')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
