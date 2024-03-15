<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use \Illuminate\Session\SessionManager;

class Wallet extends Component
{


    public $user;
    public $kourosh;
    public $withdraw = [];
    public $deposit = [];


    public function mount(SessionManager $session, Request $request)
    {
        $this->user = $this->getUser($request->userId);

    }

    public function withdraw()
    {

        $this->validate([
            'withdraw.amount' => ['required', 'integer'],
            'withdraw.meta' => ['required', 'min:8 | max:255'],
        ]);
        $this->user->withdraw($this->withdraw['amount'], [$this->withdraw['meta']]);


        $message = 'مبلغ ';
        $message .= $this->withdraw['amount'];
        $message .= ' از کیف پول کاربر کم شد';

        session()->flash('withdraw', $message);


        $this->emit('gotoTable');


    }

    public function deposit()
    {


        $this->validate([
            'deposit.amount' => ['required', 'integer'],
            'deposit.meta' => ['required', 'min:8', 'max:255'],
        ]);

        $this->user->deposit($this->deposit['amount'], [$this->deposit['meta']]);


        $message = 'مبلغ ';
        $message .= $this->deposit['amount'];
        $message .= ' به کیف پول کاربر اضافه شد';
        session()->flash('deposit', $message);


        $this->emit('gotoTable');

    }


    public function getUser($userId)
    {
        return User::find($userId);
    }

    public function render()
    {
        return view('livewire.admin.users.wallet')
            ->extends('layouts.eduport.master_dashboard')
            ->section('main');
    }
}
