<?php

namespace App\Http\Controllers\Crud;

use Afranext\Crud\App\Controllers\CrudController;
use App\Models\Faq;
use App\Models\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class FaqController extends CrudController
{
    public function config()
    {
        $this->crud->setModel(Faq::class);
        $this->crud->setEntity('faqs');
        $this->crud->customActions(['create','read','edit','delete']);
    }

    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('question');
        $this->crud->setColumn('answer');
        $this->crud->setColumn('action');
    }


    public function setupCreate()
    {

        $this->crud->setField(
            [
                'type' => 'relation',
                'method' => 'course',
                'attribute' => 'title',

            ]
        );



        $this->crud->setField(
            [
                'type' => 'textarea',
                'name' => 'question',
                'validation' => 'required | string',
            ]
        );

        $this->crud->setField(
            [
                'type' => 'textarea',
                'name' => 'answer',
                'validation' => 'required | string',
            ]
        );












    }

}
