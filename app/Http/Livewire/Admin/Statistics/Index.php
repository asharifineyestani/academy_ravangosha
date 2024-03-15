<?php

namespace App\Http\Livewire\Admin\Statistics;

use App\Models\Statistic;
use App\Models\User;
use \Illuminate\Http\Request;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = ['getItems'];
    public $items = [];
    public $userId = null;

    public $per = 50;
    public $page = 1;
    private $query;


    public function deleteAllLogs()
    {
        $this->query->delete();
        $this->emit('getItems');
    }




    public function mount(Request $request, $userId = null)
    {

        $this->query = Statistic::query()->orderBy('id', 'DESC');


        if ($request->get('ip'))
            $this->query = $this->query->where('ip', $request->get('ip'));


        if ($request->get('status_code'))
            $this->query = $this->query->where('status_code', $request->get('status_code'));








        if ($request->get('user_id'))
            $this->query = $this->query->where('user_id', $request->get('user_id'));

        if ($request->get('per'))
            $this->per = $request->get('per');




        if ($request->get('action') === 'delete')
            $this->query->delete();



        $this->items = $this->query->limit($this->per)->get();


        if ($request->get('g') == 'ip')
            $this->items = $this->query->get()->unique('ip');

        if ($request->get('g') == 'sc')
            $this->items = $this->query->get()->unique('status_code');


    }

    public function getItems()
    {
        $items = $this->query;

        if ($this->userId)
            $items = $items
                ->where('user_id', $this->userId)
                ->where('user_id', '<>', 2);


        return $items->get();

    }

    public function render()
    {
        return view('livewire.admin.statistics.index')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
