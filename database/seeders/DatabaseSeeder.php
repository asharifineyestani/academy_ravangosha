<?php

namespace Database\Seeders;

use Afranext\Crud\app\Models\Menu;
use App\Http\Controllers\Arvan\VideoCurl;
use App\Models\Course;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

//        \App\Models\Solicitation::factory(20)->create();

//        $curl = new VideoCurl();
//        $curl->updateChannels();


        $this->call([
            MenuSeeder::class,
            TagSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
            CourseSeeder::class,
//            TopicSeeder::class,
//            VideoSeeder::class,
//            FeedbackSeeder::class,

//            TaggableSeeder::class,
//            PageSeeder::class,
            CategorySeeder::class,

        ]);


//        \App\Models\Comment::factory(10)->create();
//        \App\Models\Faq::factory(100)->create();
//        \App\Models\Post::factory(17)->create();







    }
}
