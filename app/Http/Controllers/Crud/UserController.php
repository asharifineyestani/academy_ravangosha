<?php

namespace App\Http\Controllers\Crud;

use Afranext\Crud\App\Controllers\CrudController;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends CrudController
{


    public function config()
    {
        $this->crud->setModel(User::class);
        $this->crud->setEntity('users');
        $this->crud->query = $this->crud->query->where('id','<>',1);
    }


    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('name');
        $this->crud->setColumn('mobile');
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
                'name' => 'email',
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


        $this->crud->setField([
            'name' => "avatar_path",
            'type' => 'image',
            'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
            'crop' => true,      // set to true to allow cropping, false to disable
        ]);








    }





}
