<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     *
     *
     */


    public function definition()
    {

        $userIds = User::pluck('id');
        $courseIds = Course::pluck('id');
        return [
            'user_id' => $this->faker->randomElement($userIds),
//            'commentable_id' => $this->faker->randomElement($courseIds),
            'commentable_id' => 1,
            'commentable_type' => Course::class,
            'body' => $this->faker->text(),
            'star' => rand(0,5),

        ];
    }
}
