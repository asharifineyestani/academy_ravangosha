<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // حذف داده‌های موجود در جدول قبل از افزودن داده‌های جدید
//        DB::table('categories')->truncate();

        // افزودن داده‌های پیشفرض
        $categories = [
            ['id'=> 1,'slug' => 'self-development', 'title' => 'توسعه فردی'],
            ['id'=> 2,'slug' => 'academic', 'title' => 'تخصصی'],
            ['id'=> 3,'slug' => 'relationships', 'title' => 'روابط و عشق'],
            ['id'=> 4,'slug' => 'mental-health', 'title' => 'سلامت روان'],
            ['id'=> 5,'slug' => 'parenting', 'title' => 'فرزند آوری'],
            ['id'=> 6,'slug' => 'business', 'title' => 'کسب و کار'],
            // ...
        ];

        // افزودن داده‌ها به جدول
        DB::table('categories')->insert($categories);


    }
}
