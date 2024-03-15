<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $lorem = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
';

    public $excerpt = 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد';


    public function setTags($record, $tags)
    {

        foreach ($tags as $tag) {
            $checkTag = Tag::where('title', $tag)->first();
            if (!$checkTag) {
                $newTag = Tag::create(['title' => $tag]);
                $record->tags()->attach($newTag->id);
            } else {
                $record->tags()->attach($checkTag->id);
            }
        }

    }


    public function run()
    {
        //
//        $pv_html = Course::create([
//            'title' => 'آموزش HTML (رکورد کلاس خصوصی)',
//            'body' => $this->lorem,
//            'duration' => 0,
//
//            'author_id' => 2,
//            'thumbnail_path' => '/courses/pv_html.jpg',
//            'intro_path' => '/videos/intro/pv_html.mp4',
//            'excerpt' => $this->excerpt,
//            'is_private' => true,
//        ]);
//
//
//        $this->setTags($pv_html, [
//            'طراحی سایت',
//            'کد نویسی',
//            'صفحات وب',
//            'تدریس خصوصی',
//        ]);


//        $pv_css = Course::create([
//            'title' => 'آموزش CSS (رکورد کلاس خصوصی)',
//            'prerequisites' => 'HTML',
//            'body' => $this->lorem,
//            'duration' => 0,
//
//            'author_id' => 2,
//            'thumbnail_path' => '/courses/pv_css.jpg',
//            'intro_path' => '/videos/intro/pv_css.mp4',
//            'excerpt' => $this->excerpt,
//            'is_private' => true,
//        ]);
//
//
//
//        $this->setTags($pv_css, [
//            'طراحی سایت',
//            'کد نویسی',
//            'صفحات وب',
//            'تدریس خصوصی',
//        ]);

        $php = Course::create([
            'title' => 'آموزش برنامه نویسی PHP',
            'prerequisites' => 'HTML,CSS',
            'body' => $this->lorem,
            'duration' => 0,
            'price' => 399000,
            'supported_price' => 999000,
            'author_id' => 2,
            'thumbnail_path' => '/courses/a2af2811-5961-4086-a07a-fff5f5c9eaa6.jpg',
//            'intro_path' => '/videos/intro/php.mp4',
            'excerpt' => $this->excerpt,
            'channel_id' => 'a2af2811-5961-4086-a07a-fff5f5c9eaa6',
        ]);


        $this->setTags($php, [
            'برنامه نویسی',
            'بک اند',
            'سمت سرور',
        ]);


        $laravel = Course::create([
            'title' => 'آموزش فریم ورک Laravel',
            'prerequisites' => 'PHP',
            'body' => $this->lorem,
            'duration' => 0,
            'price' => 499000,
            'supported_price' => 2999000,
            'author_id' => 2,
            'thumbnail_path' => '/courses/7f5f6474-6708-4ff2-8c68-bce3ea19cd15.jpg',
            'intro_path' => '/videos/intro/laravel.mp4',
            'excerpt' => $this->excerpt,
            'channel_id' => '7f5f6474-6708-4ff2-8c68-bce3ea19cd15',
        ]);


        $this->setTags($laravel, [
            'برنامه نویسی',
            'فریم ورک',
            'بک اند',
            'سمت سرور',
        ]);
//
//
//        $mySql = Course::create([
//            'title' => 'آموزش MySql',
//            'body' => $this->lorem,
//            'duration' => 0,
//
//            'author_id' => 2,
//            'thumbnail_path' => '/courses/mysql.jpg',
//            'intro_path' => '/videos/intro/mysql.mp4',
//            'excerpt' => $this->excerpt,
//        ]);
//
//
//
//        $this->setTags($mySql, [
//            'دیتابیس',
//        ]);
//
//
//        $sheet = Course::create([
//            'title' => 'آموزش گوگل شیت',
//            'body' => $this->lorem,
//            'duration' => 0,
//
//            'author_id' => 2,
//            'thumbnail_path' => '/courses/sheet.jpg',
//            'intro_path' => '/videos/intro/sheet.mp4',
//            'excerpt' => $this->excerpt,
//        ]);
//
//
//        $this->setTags($sheet, [
//            'ابزار',
//            'مدیریت',
//        ]);
//
//
//        $triz = Course::create([
//            'title' => 'تکنیک های خلاقیت TRIZ',
//            'body' => $this->lorem,
//            'duration' => 0,
//
//            'author_id' => 2,
//            'thumbnail_path' => '/courses/triz.jpg',
//            'intro_path' => '/videos/intro/triz.mp4',
//            'excerpt' => $this->excerpt,
//        ]);
//
//
//        $this->setTags($triz, [
//            'تکنیک',
//            'مدیریت',
//            'خلاقیت',
//        ]);
//
//
//        $docker = Course::create([
//            'title' => 'آموزش داکر',
//            'status' => 'DONE',
//            'body' => $this->lorem,
//            'duration' => 0,
//            'price' => 100000,
//            'author_id' => 4,
//            'thumbnail_path' => '/courses/docker.jpg',
//            'intro_path' => '/videos/intro/docker.mp4',
//            'excerpt' => $this->excerpt,
//        ]);
//
//
//        $this->setTags($docker, [
//            'ابزار',
//            'مدیریت',
//        ]);


    }
}
