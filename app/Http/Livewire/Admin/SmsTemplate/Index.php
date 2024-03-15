<?php

namespace App\Http\Livewire\Admin\SmsTemplate;

use App\Models\ArvanVideo;
use App\Models\SmsTemplate;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    use LivewireAlert;

    public $heading = 'قالب های پیامک';

    protected $listeners = [
        'refreshItems',
        'confirmedDelete'];

    public $items = [];

    private $query;

    private $model;


    public $itemIdForDelete;


    public function __construct($id = null)
    {
        parent::__construct($id);

        $this->model = SmsTemplate::query();
    }

    public function mount()
    {
        $this->refreshItems();

    }


    public function delete($itemId)
    {

        $this->itemIdForDelete = $itemId;

        $this->alert('question', 'آیا از حذف این رکورد مطمین هستید؟', [
            'onConfirmed' => 'confirmedDelete',
            'position' => 'center',
            'timer' => '9000',
            'toast' => false,
            'timerProgressBar' => true,
            'showConfirmButton' => true,
            'showDenyButton' => false,
            'showCancelButton' => true,
            'cancelButtonText' => 'لغو',
            'confirmButtonText' => 'بله',
        ]);




    }


    public function confirmedDelete()
    {

        SmsTemplate::where('id', $this->itemIdForDelete)->delete();
        $this->emit('refreshItems');
    }

    public function refreshItems()
    {

        $this->items =  $this->model->get();

    }

    public function render()
    {
        return view('livewire.admin.sms-template.index')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
