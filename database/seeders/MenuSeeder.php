<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //




        Menu::create([
            'name' => 'برگ نخست',
            'href' => '/',
            'group' => 'footer1',
        ]);
        Menu::create([
            'name' => 'درباره ما',
            'href' => 'about',
            'group' => 'footer1',
        ]);
        Menu::create([
            'name' => 'تماس با ما',
            'href' => 'contact-us',
            'group' => 'footer1',
        ]);
        Menu::create([
            'name' => 'اخبار',
            'href' => 'news',
            'group' => 'footer1',
        ]);
        Menu::create([
            'name' => 'راهنما',
            'href' => 'help',
            'group' => 'footer1',
        ]);


        Menu::create([
            'name' => 'قوانین',
            'href' => '/pages/rules',
            'group' => 'footer4',
        ]);
        Menu::create([
            'name' => 'راهنما',
            'href' => '/pages/help',
            'group' => 'footer4',
        ]);





        $items = [
            [
                "icon" => "fa-tasks",
                "name" => "categories",
                "href" => "categories",
                "group" => "main",
                "permission" => "categories-read",
            ],

            [
                "icon" => "fa-tasks",
                "name" => "comments",
                "href" => "comments",
                "group" => "main",
                "permission" => "comments-read",
            ],
            [
                "icon" => "fa-tasks",
                "name" => "courses",
                "href" => "courses",
                "group" => "main",
                "permission" => "courses-read",
            ],
            [
                "icon" => "fa-tasks",
                "name" => "faqs",
                "href" => "faqs",
                "group" => "main",
                "permission" => "faqs-read",
            ],
            [
                "icon" => "fa-tasks",
                "name" => "feedback",
                "href" => "feedback",
                "group" => "main",
                "permission" => "feedback-read",
            ],
            [
                "icon" => "fa-tasks",
                "name" => "instructors",
                "href" => "instructors",
                "group" => "main",
                "permission" => "instructors-read",
            ],

            [
                "icon" => "fa-tasks",
                "name" => "menu",
                "href" => "menu",
                "group" => "main",
                "permission" => "menu-read",
            ],

            [
                "icon" => "fa-tasks",
                "name" => "messages",
                "href" => "messages",
                "group" => "main",
                "permission" => "messages-read",
            ],


            [
                "icon" => "fa-tasks",
                "name" => "pages",
                "href" => "pages",
                "group" => "main",
                "permission" => "pages-read",
            ],


            [
                "icon" => "fa-tasks",
                "name" => "posts",
                "href" => "posts",
                "group" => "main",
                "permission" => "posts-read",
            ],


            [
                "icon" => "fa-tasks",
                "name" => "solicitations",
                "href" => "solicitations",
                "group" => "main",
                "permission" => "solicitations-read",
            ],


            [
                "icon" => "fa-tasks",
                "name" => "tags",
                "href" => "tags",
                "group" => "main",
                "permission" => "tags-read",
            ],

            [
                "icon" => "fa-tasks",
                "name" => "topics",
                "href" => "topics",
                "group" => "main",
                "permission" => "topics-read",
            ],


            [
                "icon" => "fa-tasks",
                "name" => "users",
                "href" => "users",
                "group" => "main",
                "permission" => "users-read",
            ],


            [
                "icon" => "fa-tasks",
                "name" => "videos",
                "href" => "videos",
                "group" => "main",
                "permission" => "videos-read",
            ],


            [
                "icon" => "fa-tasks",
                "name" => "variables",
                "href" => "variables",
                "group" => "main",
                "permission" => "variable-read",
            ],


            [
                "icon" => "fa-tasks",
                "name" => "languages",
                "href" => "languages",
                "group" => "main",
                "permission" => "language-read",
            ],


        ];


        foreach ($items as $item)
            \Afranext\Crud\app\Models\Menu::create($item);
    }
}
