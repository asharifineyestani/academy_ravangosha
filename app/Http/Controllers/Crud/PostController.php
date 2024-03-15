<?php

namespace App\Http\Controllers\Crud;

use Afranext\Crud\App\Controllers\CrudController;
use App\Models\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;

class PostController extends CrudController
{


    public function config()
    {
        $this->crud->setModel(Post::class);
        $this->crud->setEntity('posts');
    }


    public function setupIndex()
    {
        $this->crud->setColumn('id' );
        $this->crud->setColumn('title' );
        $this->crud->setColumn('study_time');
        $this->crud->setColumn('created_at')->format('shamsi');
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
                'method' => 'category',
                'attribute' => 'name',

            ]
        );

        $this->crud->setField(
            [
                'name' => 'title',
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


        $this->crud->setField(
            [
                'name' => 'study_time',
                'type' => 'number',
            ]
        );



        $this->crud->setField([
            'name' => "thumbnail_path",
            'type' => 'image',
            'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
            'crop' => true,      // set to true to allow cropping, false to disable
        ]);


        $this->crud->setField(
            [
                'name' => 'count_like',
                'type' => 'number',
            ]
        );


        $this->crud->setField(
            [
                'name' => 'count_visit',
                'type' => 'number',
            ]
        );
    }


    public function setupEdit()
    {
        $this->setupCreate();
    }

}
