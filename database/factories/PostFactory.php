<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    private static $order = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userIds = User::pluck('id');
        $categoryIds = Category::pluck('id');

        return [
            'title' => __('fake.string'),
            'body' => __('fake.text'),
            'user_id' => $this->faker->randomElement($userIds),
            'category_id' => $this->faker->randomElement($categoryIds),
            'count_like' => rand(0, 5000),
            'count_visit' => rand(0, 5000),
            'study_time' => rand(1, 10),
            'thumbnail_path' => '/images/posts/' . self::$order++ . '.jpg',
        ];
    }
}
