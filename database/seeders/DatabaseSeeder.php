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




        $this->call([
//            UserSeeder::class,
//            RoleSeeder::class,
            CategorySeeder::class,

        ]);









    }
}
