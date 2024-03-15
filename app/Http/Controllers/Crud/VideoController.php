<?php

namespace App\Http\Controllers\Crud;

use Afranext\Crud\App\Controllers\CrudController;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\VoiceType;
use Illuminate\Http\Request;

class VideoController extends CrudController
{
    public function config()
    {
        $this->crud->setModel(Video::class);
        $this->crud->SetEntity('videos');
    }


    public function setupIndex()
    {
        $this->crud->setColumn('id');
        $this->crud->setColumn('topic_id');
        $this->crud->setColumn('title');
        $this->crud->setColumn('path');
        $this->crud->setColumn('duration');
        $this->crud->setColumn('is_free');
        $this->crud->setColumn('action');
    }


    public function setupCreate()
    {

        $this->crud->setField(
            [
                'type' => 'relation',
                'method' => 'topic',
                'attribute' => 'title',

            ]
        );


        $this->crud->setField([
            'name' => 'title'
        ]);

        $this->crud->setField([
            'name' => 'path',
            'type' => 'video',
        ]);


        $this->crud->setField([
            'name' => 'duration',
            'type' => 'number',
        ]);

        $this->crud->setField([
            'name' => 'is_free',
            'type' => 'boolean',
        ]);
    }
}
