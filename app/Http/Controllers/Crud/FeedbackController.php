<?php

namespace App\Http\Controllers\Crud;

use Afranext\Crud\App\Controllers\CrudController;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class FeedbackController extends CrudController
{
    public function config()
    {
        $this->crud->setModel(Feedback::class);
        $this->crud->setEntity('feedback');
        $this->crud->customActions(['read','edit','delete','create']);
    }

    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('name');
        $this->crud->setColumn('avatar_path');
        $this->crud->setColumn('headline');
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


        $this->crud->setField([
            'name' => "avatar_path",
            'type' => 'image',
            'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
            'crop' => true,      // set to true to allow cropping, false to disable
        ]);

        $this->crud->setField(
            [
                'type' => 'text',
                'name' => 'headline',
                'validation' => 'required | string',
            ]
        );





        $this->crud->setField(
            [
                'type' => 'textarea',
                'name' => 'body',
                'validation' => 'required | string',
            ]
        );


    }

}
