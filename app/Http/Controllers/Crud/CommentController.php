<?php

namespace App\Http\Controllers\Crud;

use Afranext\Crud\App\Controllers\CrudController;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Http\Controllers\Controller;
use App\Models\User;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;

class CommentController extends CrudController
{


    public function config()
    {
        $this->crud->setModel(Comment::class);
        $this->crud->setEntity('comments');
        $this->crud->customActions(['create','read','edit','delete']);
    }


    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('user_id');
        $this->crud->setColumn('commentable_id');
        $this->crud->setColumn('commentable_type');
        $this->crud->setColumn('body');
        $this->crud->setColumn('star');
        $this->crud->setColumn('created_at' )->format('shamsi');
        $this->crud->setColumn('action');
    }






    public function setupCreate()
    {

        $this->crud->setField(
            [
                'type' => 'relation',
                'method' => 'user',
                'attribute' => 'name',

            ]
        );


        $this->crud->setField(
            [
                'type' => 'relation',
                'method' => 'commentable',
                'attribute' => 'id',

            ]
        );


        $this->crud->setField(
            [
                'type' => 'tinymce_rtl',
                'name' => 'body',
                'validation' => 'required | string',
            ]
        );


        $this->crud->setField(
            [
                'name' => 'star',
                'type' => 'number',
                'validation' => 'min:1 | max:5',
            ]
        );



    }



    public function setupEdit()
    {
        $this->setupCreate();

    }





}
