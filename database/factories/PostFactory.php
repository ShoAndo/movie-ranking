<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'url' => 'https://www.youtube.com/embed/TbSxQp22NJU',
            'created_at' => now(),
            'ranking_id' => $this->faker->numberBetween(1,8),
            'user_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
