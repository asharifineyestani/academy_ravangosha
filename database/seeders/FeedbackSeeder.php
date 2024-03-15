<?php

namespace Database\Seeders;

use App\Models\Feedback;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Feedback::create(
            [
                'name' => 'مهندس امید زندی',
                'headline' => 'مدرس ۳۵ آموزش در علم و کار',
                'body' => 'در ابتدا به‌جز علم و کار، مجموعه‌های دیگری را نیز برای همکاری در نظر داشتم. اما پس از انتشار اولین آموزشم در علم و کار و مشاهده رفتار حرفه‌ای این مجموعه، تصمیم گرفتم که همکاری‌ام را منحصراً با علم و کار ادامه دهم.',
                'avatar_path' => '/images/pages/m1.jpg',
            ]
        );

        Feedback::create(
            [
                'name' => 'مهندس پژمان اقبالی شمس آبادی',
                'headline' => 'چهار سال سابقه همکاری با علم و کار',
                'body' => 'علم و کار در معرفی آموزش‌ها بسیار موفق بوده است. لینک معرفی آموزش‌های خودم و سایر همکاران را در گروه‌ها و کانال‌های آموزشی زیادی دیده‌ام. همچنین، دانشجویانی داشته‌ام که از آموزش‌ها استفاده و به یکدیگر معرفی می‌کنند که این مسأله گواه رضایت و اعتماد دانشجویان به این مجموعه است.',
                'avatar_path' => '/images/pages/f1.jpg',
            ]
        );

        Feedback::create(
            [
                'name' => 'دکتر نازنین شیرافکن',
                'headline' => 'مدرس ۴۴ آموزش در علم و کار',
                'body' => 'در طی ۶ سال فعالیت در علم و کار، بیشتر از ۱۸۰ هزار دانشجو در داخل و خارج از کشور دارم (به اندازه ظرفیت دو استادیوم ورزشی).',
                'avatar_path' => '/images/pages/f3.jpg',
            ]
        );

        Feedback::create(
            [
                'name' => 'مهندس فاطمه ولیخواه',
                'headline' => 'مولف کتاب‌های حوزه عمران',
                'body' => 'در ابتدا به‌جز علم و کار، مجموعه‌های دیگری را نیز برای همکاری در نظر داشتم. اما پس از انتشار اولین آموزشم در علم و کار و مشاهده رفتار حرفه‌ای این مجموعه، تصمیم گرفتم که همکاری‌ام را منحصراً با علم و کار ادامه دهم.',
                'avatar_path' => '/images/pages/f1.jpg',
            ]
        );
    }
}
