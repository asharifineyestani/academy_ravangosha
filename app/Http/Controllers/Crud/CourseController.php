<?php

namespace App\Http\Controllers\Crud;


use Afranext\Crud\App\Controllers\CrudController;
use App\Models\BannerPlan;
use App\Models\Category;
use App\Models\Course;
use App\Models\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends CrudController
{


    public function config()
    {
        $this->crud->setModel(Course::class);
        $this->crud->setEntity('courses');
        $this->crud->customActions(['edit', 'read','create','delete']);
    }


    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('title');
        $this->crud->setColumn('prerequisites');
        $this->crud->setColumn('duration');
        $this->crud->setColumn('count_downloaded');
        $this->crud->setColumn('price');
        $this->crud->setColumn('action');
    }


    public function setupCreate()
    {
        $this->crud->setField(
            [
                'name' => 'title',
                'validation' => 'required | string',
            ]
        );

        $this->crud->setField(
            [
                'name' => 'prerequisites',
                'validation' => 'required | string',
            ]
        );

        $this->crud->setField(
            [
                'name' => 'excerpt',
                'validation' => 'required | string',
            ]
        );


        $this->crud->setField([
            'name' => "intro_path",
            'type' => 'video',
        ]);

        $this->crud->setField(
            [
                'type' => 'tinymce_rtl',
                'name' => 'body',
                'validation' => 'required | string',
            ]
        );


        $this->crud->setField(
            [
                'name' => 'duration',
                'type' => 'number',
                'validation' => 'min:1 | max:5',
            ]
        );


        $this->crud->setField(
            [
                'name' => 'count_downloaded',
                'type' => 'number',
            ]
        );


        $this->crud->setField(
            [
                'name' => 'price',
                'type' => 'number',
                'validation' => 'min:1 | max:5',
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
                'type' => 'relation',
                'method' => 'author',
                'attribute' => 'name',

            ]
        );








    }


}
