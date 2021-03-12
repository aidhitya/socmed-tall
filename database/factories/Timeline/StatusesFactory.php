<?php

namespace Database\Factories\Timeline;

use App\Models\Timeline\Statuses;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StatusesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Statuses::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => rand(1,9),
            'hash' => Str::random(32),
            'body' => $this->faker->sentence()
        ];
    }
}
