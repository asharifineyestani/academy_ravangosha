<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $tagNames = [
            'برنامه نویسی',
            'تدریس خصوصی',
            'وب اپلیکیشن',
            'ابزار',
            'برنامه نویسی وبسایت',
            'خلاقیت',
            'دیتابیس',
            'فریم ورک',
        ];

        foreach ($tagNames as $tag)
            $newTag = Tag::create(['title' => $tag]);



    }
}
