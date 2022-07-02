<?php

namespace Database\Factories;
use App\Models\Ranking;
use Illuminate\Database\Eloquent\Factories\Factory;

class RankingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ranking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'creator' => $this->faker->name(),
            'limit_date' => now()->modify('+1week')->format('Y-m-d H:i:s'),
            'user_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
