<?php

namespace App\Http\Controllers\Crud;


use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Bavix\Wallet\Models\Transaction;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Afranext\Crud\App\Controllers\CrudController;

class TransactionController extends CrudController
{


    public function config()
    {
        $this->crud->setModel(Transaction::class);
        $this->crud->setEntity('transactions');
        $this->crud->customActions([]);

    }


    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('amount');
        $this->crud->setColumn('meta');
        $this->crud->setColumn('created_at')->format('shamsi');
        $this->crud->setColumn('user_name')->editColumn(function ($row){
            $title = $row->payable->name ?? '' ;
            $href = '/admin/users/'. $row->payable->id;
            return view('crud::partials.link', compact('title', 'href'));
        });

        $this->crud->setColumn('mobile')->editColumn(function ($row){
            $title = $row->payable->mobile;
            $href = '/admin/users/'. $row->payable->id;
            return view('crud::partials.link', compact('title', 'href'));
        });

    }



}
