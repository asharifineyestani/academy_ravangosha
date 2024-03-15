<?php

namespace App\Http\Controllers\Crud;

use Afranext\Crud\App\Controllers\CrudController;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\Message;
use App\Models\Payment;
use Illuminate\Http\Request;

class MessageController extends CrudController
{
    public function config()
    {
        $this->crud->setModel(Message::class);
        $this->crud->setEntity('messages');
        $this->crud->customActions(['read','delete']);
    }

    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('name');
        $this->crud->setColumn('body');
        $this->crud->setColumn('action');
    }

    public function setupCreate()
    {
        $this->crud->setField(
            [
                'type' => 'text',
                'name' => 'name',
                'validation' => 'required | string',
            ]
        );


        $this->crud->setField(
            [
                'type' => 'text',
                'name' => 'mobile',
                'validation' => 'required | string',
            ]
        );


        $this->crud->setField(
            [
                'type' => 'tinymce_rtl',
                'name' => 'body',
                'validation' => 'required | string',
            ]
        );




    }

}
