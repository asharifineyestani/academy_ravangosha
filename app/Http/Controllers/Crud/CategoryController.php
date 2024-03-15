<?php

namespace App\Http\Controllers\Crud;

use Afranext\Crud\App\Controllers\CrudController;
use App\Models\Category;
use App\Models\Http\Controllers\Controller;
use App\Models\User;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;

class CategoryController extends CrudController
{


    public function config()
    {
        $this->crud->setModel(Category::class);
        $this->crud->setEntity('categories');
    }


    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('title');
        $this->crud->setColumn('thumbnail_path');
        $this->crud->setColumn('created_at' )->format('shamsi');
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


        $this->crud->setField([
            'name' => "thumbnail_path",
            'type' => 'image',
            'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
            'crop' => true,      // set to true to allow cropping, false to disable
        ]);

    }



    public function setupEdit()
    {
        $this->setupCreate();

    }





}
