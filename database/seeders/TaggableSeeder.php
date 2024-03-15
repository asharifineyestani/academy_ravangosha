<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Taggable;
use Illuminate\Database\Seeder;

class TaggableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Taggable::create([
            'taggable_type' => Course::class,
            'taggable_id' => 1,
            'tag_id' => 1
        ]);
        Taggable::create([
            'taggable_type' => Course::class,
            'taggable_id' => 1,
            'tag_id' => 2
        ]);
        Taggable::create([
            'taggable_type' => Course::class,
            'taggable_id' => 1,
            'tag_id' => 3
        ]);
        Taggable::create([
            'taggable_type' => Course::class,
            'taggable_id' => 1,
            'tag_id' => 4
        ]);
        Taggable::create([
            'taggable_type' => Course::class,
            'taggable_id' => 1,
            'tag_id' => 5
        ]);
        Taggable::create([
            'taggable_type' => Course::class,
            'taggable_id' => 1,
            'tag_id' => 6
        ]);
    }
}
