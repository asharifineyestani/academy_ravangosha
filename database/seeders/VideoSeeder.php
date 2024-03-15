<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Video::create([
            'path' => '/videos/sql/1.mp4',
            'title' => 'تعریف دیتابیس',
            'topic_id' => 1,
            'duration' => rand(60,300),
            'is_free' => true,
        ]);
        Video::create([
            'path' => '/videos/sql/2.mp4',
            'title' => 'چرا MySql',
            'topic_id' => 1,
            'duration' => rand(60,300),
            'is_free' => true,
        ]);
        Video::create([
            'path' => '/videos/sql/3.mp4',
            'title' => 'لاگین از طریق ترمینال',
            'topic_id' => 2,
            'duration' => rand(60,300),
        ]);
        Video::create([
            'path' => '/videos/sql/4.mp4',
            'title' => 'معرفی phpmyadmin',
            'topic_id' => 2,
            'duration' => rand(60,300),
        ]);
        Video::create([
            'path' => '/videos/sql/5.mp4',
            'title' => 'ساخت دیتابیس',
            'topic_id' => 2,
            'duration' => rand(60,300),
        ]);
        Video::create([
            'path' => '/videos/sql/6.mp4',
            'title' => 'حفظ نکنید',
            'topic_id' => 3,
            'duration' => rand(60,300),
        ]);

        Video::create([
            'path' => '/videos/sql/7.mp4',
            'title' => 'ساخت جدول',
            'topic_id' => 4,
            'duration' => rand(60,300),
        ]);
        Video::create([
            'path' => '/videos/sql/8.mp4',
            'title' => 'دستور INSERT',
            'topic_id' => 4,
            'duration' => rand(60,300),
        ]);
        Video::create([
            'path' => '/videos/sql/9.mp4',
            'title' => 'دستور SELECT',
            'topic_id' => 4,
            'duration' => rand(60,300),
        ]);
        Video::create([
            'path' => '/videos/sql/10.mp4',
            'title' => 'دیتا تایپ ها در دیتابیس',
            'topic_id' => 4,
            'duration' => rand(60,300),
        ]);
    }
}
