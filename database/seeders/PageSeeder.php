<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Page::create([
            'user_id' => 1,
            'title' => 'درباره ما',
            'slug' => 'about',
            'body' => __('fake.text'),
        ]);

        Page::create([
            'user_id' => 1,
            'title' => 'قوانین',
            'slug' => 'rules',
            'body' => __('fake.text'),
        ]);

        Page::create([
            'user_id' => 1,
            'title' => 'راهنما',
            'slug' => 'help',
            'body' => __('fake.text'),
        ]);
    }
}
