<?php

namespace App\Http\Controllers\Crud;

use Afranext\Crud\App\Controllers\CrudController;
use App\Models\Http\Controllers\Controller;
use App\Models\Storyable;
use App\Models\Tag;
use App\Models\User;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;

class TagController extends CrudController
{


    public function config()
    {
        $this->crud->setModel(Tag::class);
        $this->crud->setEntity('tags');

    }


    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('title');
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


    }




}
