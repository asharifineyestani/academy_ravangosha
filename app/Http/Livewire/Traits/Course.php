<?php

namespace App\Http\Livewire\Traits;

trait Course
{

    public $activeCourse = null;


    public $activeCourseFields = [];


    public function updateCourse($whichField = 'intro')
    {


        switch ($whichField) {
            case 'body':
                $this->validateOnly('activeCourseFields.description');
                break;

            case 'intro':
                $this->validateOnly('activeCourseFields.title');
                $this->validateOnly('activeCourseFields.prerequisites');
                $this->validateOnly('activeCourseFields.excerpt');
                break;
        }


        \App\Models\Course::where('id', $this->activeCourse->id)->update(
            [
                'title' => $this->activeCourseFields['title'],
                'prerequisites' => $this->activeCourseFields['prerequisites'],
                'excerpt' => $this->activeCourseFields['excerpt'],
                'body' => $this->activeCourseFields['body'],
                'channel_id' => $this->activeCourseFields['channel_id'],
            ]
        );


        $this->setFormMessage("تغییرات با موفقیت ثبت شد");


        $this->emit('refreshActiveCourse');


    }


    public function refreshActiveCourse()
    {
        if ($this->activeCourse) {
            $this->activeCourse = $this->activeCourse;
        }

    }

    public function refreshActiveCourseFields()
    {
        $this->activeCourseFields = [
            'title' => $this->activeCourse->title,
            'prerequisites' => $this->activeCourse->prerequisites,
            'excerpt' => $this->activeCourse->excerpt,
            'body' => $this->activeCourse->body,
            'channel_id' => $this->activeCourse->channel_id,
        ];

    }

    public function setDefaultCourseFields()
    {

    }

}
