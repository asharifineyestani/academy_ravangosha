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
            'avatar_path' => '/users/super_admin.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'email' => 'sh4rifi@email.com'
        ]);


        $ali = User::create([
            'id' => 2,
            'mobile' => '09128182951',
            'name' => 'علی شریفی نیستانی',
            'headline' => 'مدرس برنامه نویسی',
            'avatar_path' => '/users/ali_sharifi_neyestani.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'email' => 'asharifineyestani@email.com'
        ]);


        $kourosh = User::create([
            'id' => 3,
            'mobile' => '09196965764',
            'name' => 'کوروش نیستانی',
            'headline' => 'مدرس برنامه نویسی',
            'avatar_path' => '/users/kourosh_neyestani.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'email' => 'kouroshneyestani@email.com'
        ]);


        $yaser = User::create([
            'id' => 4,
            'mobile' => '09352906065',
            'name' => 'یاسر کریمی',
            'headline' => 'مدرس برنامه نویسی',
            'avatar_path' => '/users/yaser_karimi.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'email' => 'karimi.yasser@gmail.com'
        ]);


        $javad = User::create([
            'id' => 5,
            'mobile' => '09183636043',
            'name' => 'جواد اکبری',
            'avatar_path' => '/users/javad_akbari.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'email' => 'javad1983fx@gmail.com'
        ]);


        $zahra = User::create([
            'id' => 6,
            'mobile' => '09189872097',
            'name' => 'زهرا بیگی',
            'avatar_path' => '/users/zahra_beygi.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'email' => 'zahra.beygi10@gmail.com'
        ]);


        $majid = User::create([
            'id' => 7,
            'mobile' => '09183684070',
            'name' => 'مجید صالحی',
            'avatar_path' => '/users/majid_salehi.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'email' => 'majidprogramer1400@gmail.com'
        ]);


        $mozafari = User::create([
            'id' => 8,
            'mobile' => '09186424052',
            'name' => 'فاطمه مظفری',
            'avatar_path' => '/users/fatemeh_mozafari.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'email' => 'fa.mozaffarii111@gmail.com'
        ]);


        $reza = User::create([
            'id' => 9,
            'mobile' => '09023140901',
            'name' => 'رضا نجاتی',
            'avatar_path' => '/users/reza_nejati.jpg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);


    }
}
