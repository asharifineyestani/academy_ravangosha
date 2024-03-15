<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $courseIds = Course::pluck('id');

        return [
            //
            'question' => $this->faker->text(),
            'answer' => $this->faker->text(),
            'course_id' => $this->faker->randomElement($courseIds),
        ];
    }
}
