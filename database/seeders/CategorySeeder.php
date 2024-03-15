<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'title'=> 'برنامه نویسی',
            'thumbnail_path' => '/images/categories/1.svg'
        ]);

//        Category::create([
//            'title'=> 'بازار سرمایه',
//            'thumbnail_path' => '/images/categories/2.svg'
//        ]);
//        Category::create([
//            'title'=> 'استارت آپ',
//            'thumbnail_path' => '/images/categories/3.svg'
//        ]);
//
//        Category::create([
//            'title'=> 'مهندسی نرم افزار',
//            'thumbnail_path' => '/images/categories/4.svg'
//        ]);
//        Category::create([
//            'title'=> 'هوش مصنوعی',
//            'thumbnail_path' => '/images/categories/5.svg'
//        ]);
//
//        Category::create([
//            'title'=> 'ریاضیات',
//            'thumbnail_path' => '/images/categories/6.svg'
//        ]);
//        Category::create([
//            'title'=> 'علوم انسانی',
//            'thumbnail_path' => '/images/categories/7.svg'
//        ]);
//
//        Category::create([
//            'title'=> 'هنر',
//            'thumbnail_path' => '/images/categories/8.svg'
//        ]);
//        Category::create([
//            'title' => 'رباتیک',
//            'thumbnail_path' => '/images/categories/9.svg'
//        ]);
//
//        Category::create([
//            'title' => 'داده کاوی',
//            'thumbnail_path' => '/images/categories/10.svg'
//        ]);


    }
}
