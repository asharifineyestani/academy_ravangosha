<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {


        $superAdmin = User::create([
            'id' => 1,
            'mobile' => '09185257989',
            'name' => 'سوپر ادمین',
            'avatar_path' => '/uploads/users/neyestani.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'email' => 'sh4rifi@email.com'
        ]);


//        $neyestani = User::create([
//            'id' => 2,
//            'mobile' => '09128182951',
//            'name' => 'علی نیستانی',
//            'headline' => 'بنیانگذار روانگشا',
//            'avatar_path' => '/uploads/users/neyestani.jpg',
//            'email_verified_at' => now(),
//            'remember_token' => Str::random(10),
//            'email' => 'asharifineyestani@email.com'
//        ]);




        $alireza = User::create([
            'id' => 3,
            'mobile' => '09183109935',
            'name' => 'علیرضا طاعی',
            'headline' => 'هم بنیانگذار روانگشا',
            'avatar_path' => '/uploads/users/alireza.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'email' => 'alirezataie25@gmail.com'
        ]);


       User::create([
            'id' => 4,
            'mobile' => '09121230001',
            'name' => 'بتدریج',
            'headline' => 'فروشنده کتاب',
            'avatar_path' => '/uploads/users/betadrij.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'email' => 'info@betadrij.ir'
        ]);


        User::create([
            'id' => 5,
            'mobile' => '09121230002',
            'name' => 'کاربر تستی',
            'headline' => 'کاربر عادی',
            'avatar_path' => '/uploads/users/user.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'email' => 'user@ravangosha.net'
        ]);







    }
}
