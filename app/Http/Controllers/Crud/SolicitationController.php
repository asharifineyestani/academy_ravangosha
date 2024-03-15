<?php

namespace App\Http\Controllers\Crud;

use Afranext\Crud\App\Controllers\CrudController;
use App\Models\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Solicitation;
use App\Models\User;
use Illuminate\Http\Request;

class SolicitationController extends CrudController
{


    public function config()
    {
        $this->crud->setModel(Solicitation::class);
        $this->crud->setEntity('solicitations');
        $this->crud->customActions(['read','update','delete','create']);


    }


    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('name');
        $this->crud->setColumn('mobile');
        $this->crud->setColumn('body');
        $this->crud->setColumn('action');
    }


    public function setupCreate()
    {

        $this->crud->setField(
            [
                'name' => 'name',
                'validation' => 'required | string',
            ]
        );

        $this->crud->setField(
            [
                'name' => 'mobile',
                'validation' => 'required | string',
            ]
        );


        $this->crud->setField(
            [
                'name' => 'body',
                'type' => 'tinymce_rtl',
                'validation' => 'required|string',
            ]
        );


    }



}
