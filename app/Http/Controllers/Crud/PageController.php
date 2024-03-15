<?php

namespace App\Http\Controllers\Crud;

use Afranext\Crud\App\Controllers\CrudController;
use App\Models\Page;


class PageController extends CrudController
{


    public function config()
    {
        $this->crud->setModel(Page::class);
        $this->crud->setEntity('pages');
    }


    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('title');
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
                'name' => 'title',
                'validation' => ' required | string',
            ]
        );

        $this->crud->setField(
            [
                'name' => 'slug',
                'validation' => 'required|unique:pages,slug',
            ]
        );


        $this->crud->setField(
            [
                'type' => 'tinymce_rtl',
                'name' => 'body',
                'validation' => 'required',
            ]
        );

    }


    public function setupEdit()
    {
        $this->setupCreate();

        $this->crud->setField(
            [
                'name' => 'slug',
                'validation' => 'required|unique:pages,slug,' . $this->crud->row->id,
            ]
        );


    }


}
