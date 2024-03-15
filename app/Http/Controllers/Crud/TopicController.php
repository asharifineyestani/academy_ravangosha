<?php

namespace App\Http\Controllers\Crud;

use Afranext\Crud\App\Controllers\CrudController;
use App\Models\Http\Controllers\Controller;
use App\Models\Storyable;
use App\Models\Tag;
use App\Models\Topic;
use App\Models\User;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;

class TopicController extends CrudController
{


    public function config()
    {
        $this->crud->setModel(Topic::class);
        $this->crud->setEntity('topics');

    }


    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('course_id');
        $this->crud->setColumn('title');
        $this->crud->setColumn('action');
    }



    public function setupCreate()
    {

        $this->crud->setField(
            [
                'type' => 'relation',
                'method' => 'course',
                'validation' => 'required | string',
            ]
        );


        $this->crud->setField(
            [
                'name' => 'title',
                'validation' => 'required | string',
            ]
        );


    }




}
