<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;

class Price extends Component
{
    public $course;
    public $items;


    public function render()
    {
        return view('livewire.course.price');
    }

    public function mount($course)
    {
        $this->course = $course;

        $package_video = [
            'id' => 1,
            'title' => 'پکیج ویدیویی',
            'price' => $this->course->price,
            'button_title' => 'خرید پکیچ',
            'description' => 'این پکیج شامل امکان مشاهده ی ویدیوهای کلاس می باشد. در صورت نیاز به پشتیبانی گزینه ی دیگر را انتخاب نمایید.',
        ];


        $package_supported = [
            'id' => 2,
            'title' => 'پکیج همراه با استاد پشتیبان',
            'price' => $this->course->supported_price,
            'button_title' => 'خرید پکیچ',
            'description' => 'در این پکیج علاوه بر امکان مشاهده ویدیوهای دوره از پشتیبانی آنلاین استاد نیز برخوردار خواهید بود. همچنین این پکیج شامل تمرین، پیگیری و جلسات رفع اشکال نیز می باشد.',
        ];

        $this->items = [
            $package_video,
            $package_supported
        ];
    }
}
