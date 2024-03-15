<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $superAdmin = Role::create(['name' => 'super-admin']);
        $instructor = Role::create(['name' => 'instructor']);



        User::find(1)->assignRole($superAdmin);
        User::find(2)->assignRole($instructor);
        User::find(3)->assignRole($instructor);
        User::find(4)->assignRole($instructor);


    }
}
