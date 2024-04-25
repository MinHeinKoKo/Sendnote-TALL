<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1,11),
            'title' => fake()->sentence(),
            'body' => fake()->text(),
            'send_date' => fake()->date(),
            'is_published' => true,
            'heart_count' => fake()->randomNumber(3, false)
        ];
    }
}
