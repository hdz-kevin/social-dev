<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;

        return [
            'title' => $faker->sentence(5),
            'description' => $faker->sentence(20),
            'picture' => $faker->uuid().".png",
            'user_id' => $faker->randomElement([1, 3, 4]),
        ];
    }
}
